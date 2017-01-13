<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all of the products for the collection.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
