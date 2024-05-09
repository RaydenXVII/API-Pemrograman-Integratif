<?php

namespace App\Http\Controllers;

use App\Models\Productline;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Productline as ProductlineResource;

class ProductlinesController extends BaseController
{
    public function index()
    {
        $productlines = Productline::all();
        return $this->sendResponse(ProductlineResource::collection($productlines), 'Post Fetched');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productLine' => 'required',
            'textDescription' => '',
            'htmlDescription' => '',
            'image' => '',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::table('productlines')->insert($input);

        $productline = DB::table('productlines')->where('productLine', $input['productLine'])->first();

        return $this->sendResponse(new ProductlineResource($productline), 'Post Created.');
    }

    public function show($key)
    {
        $productlines = Productline::where('productLine', $key)->first();
        if (is_null($productlines)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new ProductlineResource($productlines), 'Post Fetched.');
    }

    public function update(Request $request, $key)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'productLine' => 'required|max:50',
            'textDescription' => 'max:4000',
            'htmlDescription' => '',
            'image' => '',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $existingProductLine = DB::table('productlines')
            ->where('productLine', $key)
            ->first();

        if (is_null($existingProductLine)) {
            return $this->sendError('Product line does not exist.');
        }

        DB::table('productlines')
            ->where('productLine', $key)
            ->update($input);

        $updatedProductLine = DB::table('productlines')
            ->where('productLine', $input['productLine'])
            ->first();

        return $this->sendResponse(new ProductlineResource($updatedProductLine), 'Product line updated.');
    }

    public function destroy($key)
    {
        $existingProductLine = DB::table('productlines')
            ->where('productLine', $key)
            ->first();

        if (is_null($existingProductLine)) {
            return $this->sendError('Product line does not exist.');
        }

        DB::table('productlines')
            ->where('productLine', $key)
            ->delete();

        return $this->sendResponse([], 'Product line deleted.');
    }
}
