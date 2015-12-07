<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table="images";

    protected $fillable=['image_id','location_id','link'];

    public function findId($id){
    	$images= $this->where('location_id',$id);
    	return $images;
    }
}
