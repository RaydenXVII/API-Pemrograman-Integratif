<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Products as ProductsResource;
use App\Http\Controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        $products = Products::all();
        return $this->sendResponse(ProductsResource::collection($products), 'Post Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required|numeric',
            'buyPrice' => 'required|numeric',
            'MSRP' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('products')->insert($input);

        $products = DB::table('products')->where('productCode', $input['productCode'])->first();

        return $this->sendResponse(new ProductsResource($products), 'Post Created.');
    }

    public function show($key)
    {
        $products = Products::where('productCode', $key)->first();
        if (is_null($products)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new ProductsResource($products), 'Post Fetched.');
    }

    public function update(Request $request, $key)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required|numeric',
            'buyPrice' => 'required|numeric',
            'MSRP' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $existingProduct = DB::table('products')
            ->where('productCode', $key)
            ->first();

        if (is_null($existingProduct)) {
            return $this->sendError('Product does not exist.');
        }

        DB::table('products')
            ->where('productCode', $key)
            ->update($input);

        $updatedProduct = DB::table('products')
            ->where('productCode', $input['productCode'])
            ->first();

        return $this->sendResponse(new ProductsResource($updatedProduct), 'Product updated.');
    }

    public function destroy($key)
    {
        $existingProduct = DB::table('products')
            ->where('productCode', $key)
            ->first();

        if (is_null($existingProduct)) {
            return $this->sendError('Product does not exist.');
        }

        DB::table('products')
            ->where('productCode', $key)
            ->delete();

        return $this->sendResponse([], 'Product deleted.');
    }
}
