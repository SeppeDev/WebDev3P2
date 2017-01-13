<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["position",
                            "product_id",];
    
    /**
     * Get the product that owns the hot item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
