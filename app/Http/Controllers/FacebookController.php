<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Session;
use App\Facebook;

class FacebookController extends Controller
{
   
    public function getCode(){
        session_start();
        $fb = new Facebook;

        return redirect($fb->getLoginUrl());
    }

    public function saveAccessToken(){
        try {
            $fb = new Facebook;
            if(isset($_GET['code'])){
                $result = $fb->callback($_GET['code']);
                $accessToken = $result->access_token;
            }
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          return 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          return 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        if(isset($accessToken)){
            Session::put('facebook_access_token',$accessToken);
        }
        if(session('redirectPath'))
            return redirect(session('redirectPath'));
        else 
            return redirect('/');
    }


}
