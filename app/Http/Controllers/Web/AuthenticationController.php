<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //
    public function getSocialRedirect( $account ){
        try{
            return Socialite::with( $account )->redirect();
            }catch ( \InvalidArgumentException $e ){
            return redirect('/login');
            }
    }

    public function getSocialCallback( $account ){

    }
}
