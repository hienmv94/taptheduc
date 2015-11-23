<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";

    protected $fillable=['category_id','category_name','Category_category_id'];
}
