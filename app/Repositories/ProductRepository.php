<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function all()
    {
        return Product::get();
    }

    public function byId($id)
    {
        return Product::where("id", $id)
                    ->with("faqs")
                    ->first();
    }

    public function byIdWithAll($id)
    {
        return Product::where("id", $id)
                    ->with("faqs", "sizes", "collections", "pictures", "colors")
                    ->first();
    }

    public function allPaged()
    {
        return Product::Paginate(5);
    }

    public function search($value, $price, $categories)
    {
        return Product::whereBetween('price', [50, 60])
                        ->whereIn('category_id', $categories)
                        ->where("name", 'like', '%'.$value.'%')
                        ->orWhere("description", 'like', '%'.$value.'%')
                        ->orWhere("technical_description", 'like', '%'.$value.'%')
                        ->Paginate(5);
    }
}