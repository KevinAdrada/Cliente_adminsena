<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $courses = Http::get($url . '/courses')->json();
        $apprentices = $this->fetchDataFromApi($url . '/apprentices');
        return view('apprentices.index', compact('apprentices', 'courses'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        return view('apprentices.show', compact('apprentice'));
    }

    public function create()
    {
        return view('apprentices.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/apprentices', $request->all());
        return redirect()->route('apprentice.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        return view('apprentices.edit', compact('apprentice'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/apprentices/' . $id, $request->all());

        return redirect()->route('apprentice.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentices/' . $id);
        return redirect()->route('apprentice.index');
    }
}