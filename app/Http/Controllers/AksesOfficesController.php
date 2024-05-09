<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AksesOfficesController extends Controller
{
    public function memanggilAPIGetAlldata()
    {
        $token = '2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('1201220445.test/api/offices');

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilAPiGetDataByID($officeCode)
    {
        $token = '2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->get('1201220445.test/api/offices/' . $officeCode);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiCreate(Request $request)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->post('1201220445.test/api/offices', $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }

    public function memanggilApiUpdate(Request $request, $officeCode)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->put('1201220445.test/api/offices/' . $officeCode, $request->all());

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }


    public function memanggilApiDelete($officeCode)
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])
            ->delete('1201220445.test/api/offices/' . $officeCode);

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
