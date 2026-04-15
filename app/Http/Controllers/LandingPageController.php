<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman landing page.
     */
    public function index()
    {
        // 'landing' merujuk ke file 'resources/views/landing.blade.php'
        return view('landing');
    }
}
