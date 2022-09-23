<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class authcontroller extends Controller
{
    public function githubredirect(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback(Request $request)
    {
        $userdata = Socialite::driver('github')->user();

        $user = User::where('email', $userdata->email)->where('auth_type', 'github')->first();

        if($user) {

            echo "Hello moto";
            Auth::login($user);
            //dd($userdata);
            return redirect('/');


        } else {

            $uuid = Str::uuid()->toString();

            $user = new User();
            $user->name = $userdata->name;
            $user->email = $userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'github';
            $user->save();

            Auth::login($user);
            return redirect('/');

        }

        
    }
}
