<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{

    protected $table = 'product_detail';

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
