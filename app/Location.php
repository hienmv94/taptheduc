<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    protected $table='location';

    protected $fillable= ['location_name','location_id','address','contact','coordinates','area','category_id','actived'];

    public function viewAll(){
    	$location = DB::table('location')->join('category', 'location.category_id', '=', 'category.category_id')
    	->select('location.*','category.category_name as category_name');
    	return $location;
    }
}
