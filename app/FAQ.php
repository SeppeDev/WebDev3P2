<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["question",
                            "awnser",
                            "category_id",];

     /**
     * Get the category that owns the FAQ.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * The products that own the FAQ.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
