<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

     /**
     * Get all of the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    /**
     * Get all of the faqs for the category.
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
