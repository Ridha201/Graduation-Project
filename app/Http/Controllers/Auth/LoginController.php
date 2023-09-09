<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/";

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
           
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
           
            return redirect('/login')->with('error', 'Google authentication failed.');
        }
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            
            auth()->login($existingUser);
        } else {  
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = Hash::make(Str::random(16)); 
            $newUser->save();
            auth()->login($newUser);
        }
        return redirect('/');
    }

    public function redirectToFacebook(){
           return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            
            auth()->login($existingUser);
        } else {  
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = Hash::make(Str::random(16)); 
            $newUser->save();
            auth()->login($newUser);
        }
        return redirect('/');
}

public function redirectToTwitter()
{
    return Socialite::driver('twitter')->redirect();
}

public function handleTwitterCallback(){
    try {
           
        $user = Socialite::driver('twitter')->user();
    } catch (\Exception $e) {
       
        return redirect('/login')->with('error', 'Twitter authentication failed.');
    }
    $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            
            auth()->login($existingUser);
        } else {  
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = Hash::make(Str::random(16)); 
            $newUser->save();
            auth()->login($newUser);
        }
        return redirect('/');
    
}
}