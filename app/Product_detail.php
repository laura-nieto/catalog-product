<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{

    protected $table = 'product_detail';

    protected $fillable = [
        'height', 'size', 'color1','color2','color3','texture','price'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
