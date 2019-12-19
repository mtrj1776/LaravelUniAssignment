<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Gateway\GoogleGateway;
use App\Gateway\Gateway;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // available gateway variable for LoginController function
    private $gateway;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/threads';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Gateway $gateway)
    {
        // assign gateway to function variable
        $this->gateway = $gateway;
        $this->middleware('guest')->except('logout');
    }

    // redirect view to providers page
    public function redirectToProvider()
    {
        return $this->gateway->redirectToProvider();
    }

    // obtain user information from provider and receive
    public function handleProviderCallback()
    {
        return $this->gateway->handleProviderCallback();
    }
}
