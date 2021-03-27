<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_detail()
    {
        return $this->belongsTo('App\Product_detail');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function asset(){
        return $this->hasMany('App\Asset','product_id');
    }
}
