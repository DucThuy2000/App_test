<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    public function orderDetails(){
        return $this->hasMany("App\OrderDetail", "order_id");
    }
}
