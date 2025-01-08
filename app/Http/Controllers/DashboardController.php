<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() {

        $nama = ['ucup', 'dimas', 'adi', 'agus'];
        $NIM = [12345, 345678, 567890, 45678];

        return view('dashboard', compact('nama', 'NIM'));
    }
}
