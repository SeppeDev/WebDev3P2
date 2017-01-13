<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["category_id",
                            "name",
                            "price",
                            "description",
                            "technocal_description",];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Get the collections that own the product.
     */
    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }
    
    /**
     * Get the hotitem for the product.
     */
    public function hotitem()
    {
        return $this->hasOne(HotItem::class);
    }

    /**
     * Get all of the faqs for the product.
     */
    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

    /**
     * Get all of the sizes for the product.
     */
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    /**
     * Get all of the colors for the product.
     */
    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    /**
     * Get all of the pictures for the product.
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
