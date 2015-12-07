<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use Session;

class Facebook extends Model
{

	private $fb;
    public function __construct(){
        $this->fb = Config::get('facebook');
    }

    public function getLoginUrl(){
    	$loginUrl = 'https://www.facebook.com/'.$this->fb['default_graph_version'].'/dialog/oauth?';
        $loginUrl.='&client_id='.$this->fb['app_id'];
        $loginUrl.='&client_secret='.$this->fb['app_secret'];
        $loginUrl.='&scope='.$this->fb['app_scope'];
        $loginUrl.='&redirect_uri='.$this->fb['redirect_uri'];
        return $loginUrl;
    }

    public function callback($code){
        $url = 'https://graph.facebook.com/'.$this->fb['default_graph_version'].'/oauth/access_token?';
        $fields = array(
            'client_id' => $this->fb['app_id'],
            'redirect_uri' => $this->fb['redirect_uri'],
            'client_secret' => $this->fb['app_secret'],
            'code' => $code,
            );
        $access = $this->httpRequest($url,$fields);
        $secret = json_decode($access);
        return $secret;
    }

	public function getUserInfo($fields,$accessToken){
        $url = 'https://graph.facebook.com/'.$this->fb['default_graph_version'].'/me?';
        $params = array(
            'fields'=>$fields,
            'access_token'=>$accessToken
            );
        $url.= '&fields='.$fields.'&access_token='.$accessToken;
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
