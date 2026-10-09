<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $users = $this->fetchDataFromApi($url . '/users');
        return view('users.index', compact('users'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');
        $user = $this->fetchDataFromApi($url . '/users/' . $id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/users', $request->all());
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $user = $this->fetchDataFromApi($url . '/users/' . $id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/users/' . $id, $request->all());
        return redirect()->route('user.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/users/' . $id);
        return redirect()->route('user.index');
    }
}