<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["product_id",
                            "url",];

    /**
     * Get the product that owns the picture.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
