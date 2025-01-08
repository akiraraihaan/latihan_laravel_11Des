<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index()
    {
        $response = Http::get('https://fs.tokopedia.net/inventory/v1/fs/13004/product/category?keyword=Tas%20Sekolah%20Anak');
        $categories = $response->json();

        return view('categories', compact('categories'));
    }
}
