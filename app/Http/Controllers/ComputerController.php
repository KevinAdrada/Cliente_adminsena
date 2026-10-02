<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ComputerController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $token = Session::get('api_token');

        $response = Http::withToken($token)->get($url . '/computers');

        if ($response->successful()) {
            $computers = $response->json()['data'] ?? [];
            return view('computer.index', compact('computers'));
        }

        return back()->with('error', 'No se pudo obtener el listado de computadoras.');
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