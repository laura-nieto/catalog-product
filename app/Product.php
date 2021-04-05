<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'price','phone',
    ];

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

    public function product_user()
    {
        return $this->belongsToMany('App\User','product_user');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
