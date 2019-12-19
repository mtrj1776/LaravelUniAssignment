<?php

namespace App\Gateway;

use App\Providers\RouteServiceProvider;
use App\Gateway\Gateway;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite; // googles scraper that returns information


class GoogleGateway implements Gateway
{
    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    // redirect view to providers page
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    // obtain user information from provider and receive
    public function handleProviderCallback()
    {
        // if google failsto return user information
        try
        {
            $user = Socialite::driver('google')->user();
        }
        catch (\Exception $e) // return to login page
        {
            return redirect('/threads');
        }
       
        // an email address must be unique
        $returningUser = User::where('external_id', $user->id)->first();

        // if email address doesnt exist
        if($returningUser)
        {
            // log them in
            auth()->login($returningUser, true);
        }
        else
        {
            // store new user using google information received
            $a = new User();
            $a->name = $user->name;
            $a->display_name = $user->name;
            $a->display_name .= rand(1, 10);
            $a->email = $user->email;
            $a->email_verified_at = now();
            $a->canCreate= 1;
            $a->canEdit= 0;
            $a->canDelete= 0;
            $a->permission_level = "user";
            $a->external_id = $user->id;
            $a->save();
        }
        return redirect()->to('/threads');
    }
}
