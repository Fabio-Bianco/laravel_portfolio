<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SplashController extends Controller
{
    public function index(): View
    {
        return view('splash');
    }
}
