<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

    // Redirect to Google's OAuth Service.

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


     //Handle the callback from Google.

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd($googleUser);

            // Logic: Find existing user by email
            $user = User::where('email', $googleUser->email)->first();
            // dd($user);

            // link google id if not already present
            if($user){
                if(!$user->google_id){
                    $user->update([
                        'google_id' => $googleUser->id,
                    ]);
                }
            }else{
                //create new user
                $user = User::create(([
                    'name'=>$googleUser->name,
                    'email'=>$googleUser->email,
                    'google_id'=>$googleUser->id,
                    'avatar'=>$googleUser->avatar ?? null,
                    'password'=> bcrypt(uniqid()),
                ]));
            }

            Auth::login($user);
            //redirect  based on whether custom input (phone) extra
            //profile details are needed

            return empty($user->phone) ?
            redirect()->route('profile') :
            redirect()->intended('/dashboard');

        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Google authentication failed. Please try again.');
        }
    }

    //profile check complete
    public function completeProfile(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $user->update(['phone' => $request->phone]);

        return redirect('/dashboard')->with('success', 'Profile completed successfully.');
    }
}
