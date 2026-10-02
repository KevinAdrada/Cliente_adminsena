<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private function api()
    {
        $token = session('api_token');
        $response = Http::withToken($token);
        return $response;
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->api()->get($url . '/areas');
        
        $responseData = $response->json();
        
        $areas = $responseData['data'] ?? [];

        return view('area.index', compact('areas'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}