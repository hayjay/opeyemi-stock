<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedProduct extends Model
{
    protected $fillable = ['product_id', 'id', 'added_by', 'reference', 'quantity', 'price', 'total'];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
