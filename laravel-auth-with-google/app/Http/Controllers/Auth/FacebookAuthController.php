<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    // Redirect to Facebook's OAuth Service.

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //handle the callback from Facebook
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            // dd($facebookUser);

            // Logic: Find existing user by email
            $user = User::where('email', $facebookUser->email)->first();
            // dd($user);

            // link facebook id if not already present
            if ($user) {
                if (!$user->facebook_id) {
                    $user->update([
                        'facebook_id' => $facebookUser->id,
                    ]);
                }
            } else {
                //create new user
                $user = User::create(([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'avatar' => $facebookUser->avatar ?? null,
                    'password' => bcrypt(uniqid()),
                ]));
            }

            Auth::login($user);
            //redirect  based on whether custom input (phone) extra
            //profile details are needed

            return empty($user->phone) ?
                redirect()->route('profile') :
                redirect()->intended('/dashboard');
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Facebook authentication failed. Please try again.');
        }
    }
}
