<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkLogin()
    {
        $loggedIn = false;
        if (Auth::check()) {
            $loggedIn = true;
        }
        return response()->json(['loggedIn' => $loggedIn]);
    }
}
