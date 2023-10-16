<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user() ;
            // dd($user->getEmail());
            $finduser = User::where('google_id',$user->getId())->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/welcome');
            }else{
                // dd($user->id);
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('12345678')
                ]);

                Auth::login($newUser);
                return redirect()->intended('/welcome');
            }

        } catch (\Throwable $th) {
            
        }
    }
}
