<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function home()
    {
        return view('index'); // Pastikan Anda memiliki view home.blade.php
    }

    public function profile()
    {
        return view('profile'); // Pastikan Anda memiliki view profile.blade.php
    }

    public function contact()
    {
        return view('contact'); // Pastikan Anda memiliki view contact.blade.php
    }
}
