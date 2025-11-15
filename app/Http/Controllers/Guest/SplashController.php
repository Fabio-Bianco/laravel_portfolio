<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SplashController extends Controller
{
    public function index(): View
    {
        return view('guest.splash');
    }
}
