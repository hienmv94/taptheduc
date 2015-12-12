<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    protected $table='location';

    protected $fillable= ['name','id','address','link','contact','coordinates','area','category_id','actived','describe','sale','price'];

    public function viewAll(){
    	$location = DB::table('location')->join('category', 'location.category_id', '=', 'category.category_id')
    	->select('location.*','category.category_name as category_name','category.link as category_link');
    	return $location;
    }
    public function findId($id){
    	$location= $this->viewAll()->where('id',$id);
    	return $location;
    }

    public function search($key, $category, $range){
        
        if ($range==0){
            $location=$this->searchPlace($key,$category);
        }
        if ($range==1){
            $location=$this->searchPlace($key,$category)->where('area','<','100');
        } 
        if ($range==2){
            $location=$this->searchPlace($key,$category)->whereBetween('area',[100,400]);
        } 
        if ($range==3){
            $location=$this->searchPlace($key,$category)->where('area','>=','400');
        } 
        return $location; 
    }
    public function searchPlace($key,$category){
        $diadiem=stripUnicode($key);
        if ($category!=0) {
           $location = DB::table('location')->join('category', 'location.category_id', '=', 'category.category_id')
        ->select('location.*','category.category_name as category_name','category.link as category_link')->where('location.link','like','%'.$diadiem.'%')->where('location.category_id',$category)->where('actived','=',1);
        } else {
            $location = DB::table('location')->join('category', 'location.category_id', '=', 'category.category_id')
        ->select('location.*','category.category_name as category_name','category.link as category_link')->where('location.link','like','%'.$diadiem.'%')->where('actived','=',1);
        }
        return $location;
    }

    public function myLocation($user_email){
        $location = DB::table('location')->join('users','users.id','=','location.user_id')
        ->join('category', 'location.category_id', '=', 'category.category_id')
        ->select('location.*','category.category_name as category_name')
        ->where('users.email',$user_email)->get();
        return $location;
    }
}
