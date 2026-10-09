<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API');
        $courses = Http::get($url . '/courses')->json();
        return view('courses.index', compact('courses'));
    }
}
