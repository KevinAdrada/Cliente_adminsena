<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $token = Session::get('api_token');

        $response = Http::withToken($token)->get($url . '/training_centers');

        if ($response->successful()) {
            $training_centers = $response->json()['data'] ?? [];
            return view('training_center.index', compact('training_centers'));
        }

        return back()->with('error', 'No se pudo obtener el listado de centros de formación.');
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