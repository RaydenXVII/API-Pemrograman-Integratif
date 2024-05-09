<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesProductLinesController extends Controller
{
    //ProductLines
    public function memanggilApiGetAllData()
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->get('1201220445.test/api/productlines');

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
    public function memanggilApiGetByKey($key)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->get('1201220445.test/api/productlines/' . $key);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }


    public function memanggilApiPost(Request $request)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->post('1201220445.test/api/productlines', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiPut(Request $request)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->put('1201220445.test/api/productlines', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
    public function memanggilApiDelete($key)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->delete('1201220445.test/api/productlines/' . $key);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
