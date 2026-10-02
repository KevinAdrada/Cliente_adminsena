<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $urlServerApi = env('URL_SERVER_API');

        $response = Http::post($urlServerApi . '/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            Session::put('api_token', $data['token'] ?? null);
            Session::put('user_data', $data['data'] ?? null);

            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', '¡Bienvenido de nuevo!');
        }

        $errorMsg = $response->json()['message'] ?? 'Credenciales incorrectas.';
        return back()->withErrors(['email' => $errorMsg])->withInput();
    }
    
    public function register(Request $request)
    {
        $urlServerApi = env('URL_SERVER_API');

        $response = Http::post($urlServerApi . '/register', $request->all());

        if ($response->successful()) {
            $data = $response->json();

            Session::put('api_token', $data['token'] ?? null);
            Session::put('user_data', $data['data'] ?? null);

            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', '¡Cuenta registrada e iniciada con éxito!');
        }
        return back()->withErrors($response->json()['errors'] ?? [])->withInput();
    }

    public function logout(Request $request)
    {
        $urlServerApi = env('URL_SERVER_API');
        $token = Session::get('api_token');

        if ($token) {
            Http::withToken($token)->post($urlServerApi . '/logout');
        }

        Session::forget(['api_token', 'user_data']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }
}