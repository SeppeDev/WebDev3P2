<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', "hex_colour"];

     /**
     * Get the product tha owns the color.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
