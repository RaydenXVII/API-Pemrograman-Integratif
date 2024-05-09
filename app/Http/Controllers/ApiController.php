<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function memanggilApi()
    {
        $token = "2|oPHXI4aloqOjTwqI35TTiIelCbYdCumFdRhn9flI90bda888";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
            ->get('1201220445.test/api/');

        $jsonData = $response->json();

        return response()->json($jsonData, $response->getStatusCode());
    }
}
