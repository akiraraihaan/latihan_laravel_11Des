<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeansController extends Controller
{
    public function index()
    {
        $response = Http::get('https://jellybellywikiapi.onrender.com/api/beans');
        $beans = $response->json();

        return view('beans', compact('beans'));
    }
}
