<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function twitter()
    {
        return view('components.twitter');
    }
    public function reddit()
    {
        return view('components.reddit');
    }
    public function pinterest()
    {
        return view('components.pinterest');
    }
}
