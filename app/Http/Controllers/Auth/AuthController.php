<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\FacebookHelper;
use Session;
use App\Facebook;
use App\Google;
use Config;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    
    /**
     * Create a new authentication controller instance.
     *
     * return void
     */
    

    public function loginFacebook(){
        Session::put('redirectPath','auth/callback/facebook');
        return redirect('getcode/facebook');
    }

    public function postLoginFacebook(){
        $accessToken = session('facebook_access_token');
        $fb = new Facebook;
        $userFB = $fb->getUserInfo('id,name,email',$accessToken);
        $test = new User;
        if(!$test->findEmail($userFB->email)) {
            $user = new User;
            $user->name=$userFB->name;
            $user->email=$userFB->email;
            $user->save();
        }
        Session::put('user_name',$userFB->name);
        Session::put('user_email',$userFB->email);
        return redirect('');
    }


    public function loginGoogle(){
        Session::put('redirectPath','auth/callback/google');
        return redirect('getcode/google');
    }

    public function postLoginGoogle(){
        $accessToken = session('google_access_token');
        $gg = new Google;
        $userGG = $gg->getUserInfo($accessToken);
        $test = new User;
        if(!$test->findEmail($userGG->email)) {
            $user = new User;
            $user->name=$userGG->name;
            $user->email=$userGG->email;
            $user->save();
        }
        Session::put('user_name',$userGG->name);
        Session::put('user_email',$userGG->email);
        return redirect('/');
    }

    public function logout(){
        Session::forget('user_name');
        Session::forget('user_email');
        return redirect('');
    }
}
