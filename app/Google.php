<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;

class Google extends Model
{
    private $gg;
    public function __construct(){
    	$this->gg = Config::get('google');
    }
    public function getLoginUrl(){
    	$loginUrl = $this->gg['auth_uri'].'?';
        $loginUrl.='&client_id='.$this->gg['client_id'];
        $loginUrl.='&scope='.$this->gg['scope'];
        $loginUrl.='&redirect_uri='.$this->gg['redirect_uri'];
        $loginUrl.='&response_type=code';

        return $loginUrl;
    }

    public function callback($code){
        $url = 'https://www.googleapis.com/oauth2/v3/token?';
        $fields = array(
            'client_id' => $this->gg['client_id'],
            'redirect_uri' => $this->gg['redirect_uri'],
            'client_secret' => $this->gg['client_secret'],
            'code' => $code,
            'grant_type'=>'authorization_code'
            );
        $access = $this->httpRequest($url,$fields);
        $secret = json_decode($access);
        return $secret;
    }

    public function getUserInfo($accessToken){
        $url = 'https://www.googleapis.com/oauth2/v1/userinfo?';
        $url.= '&alt=json'.'&access_token='.$accessToken;
        $context = stream_context_create(
                    array('http' => 
                        array('method' => 'GET',
                        )
                    )
                );
        $kq = file_get_contents($url,false,$context);
        $result = json_decode($kq);
        return $result;
    }

    public function httpRequest($url,$params)
    {
        $postData = '';
           //create name value pairs seperated by &
        foreach($params as $k => $v) 
        { 
            $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
        $output=curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
