<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $admins = $this->fetchDataFromApi($url . '/admins');
        return view('admins.index', compact('admins'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $admin = $this->fetchDataFromApi($url . '/admins/' . $id);

        return view('admins.show', compact('admin'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/admins', $request->all());
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $admin = $this->fetchDataFromApi($url . '/admins/' . $id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/admins/' . $id, $request->all());
        return redirect()->route('admin.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/admins/' . $id);
        return redirect()->route('admin.index');
    }
}