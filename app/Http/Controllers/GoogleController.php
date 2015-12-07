<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Google;
use Config;
use Session;

class GoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function getCode(){
    $gg = new Google;
    return redirect($gg->getLoginUrl());
   }

   public function saveAccessToken(){
        $gg = new Google;
        if(isset($_GET['code'])){
            $result = $gg->callback($_GET['code']);
            $accessToken = $result->access_token;
        }
        if(isset($accessToken)){
            Session::put('google_access_token',$accessToken);
        }
        if(session('redirectPath'))
            return redirect(session('redirectPath'));
        else 
            return redirect('/');
    }
}
