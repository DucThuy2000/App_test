<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $table = "product_category";

    public function products(){
        return $this -> hasMany("App\Product", "category_id");
    }
}
