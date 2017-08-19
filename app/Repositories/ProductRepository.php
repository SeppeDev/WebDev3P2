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

    public function filter($collections, $price, $category)
    {
        return Product::whereBetween('price', [$price[0], $price[1]])
                        ->where('category_id', $category)
                        ->whereHas("collections", function($query) use ($collections){
                                return $query->whereIn("collections.id", $collections);
                            })
                        ->get();
    }

    public function search($value, $price, $categories)
    {
        return Product::whereBetween('price', [$price[0], $price[1]])
                        ->whereIn('category_id', $categories)
                        ->where(function($query) use ($value){
                            $query->where("name", 'like', '%'.$value.'%');
                            $query->orWhere("description", 'like', '%'.$value.'%');
                            $query->orWhere("technical_description", 'like', '%'.$value.'%');
                        })
                        ->Paginate(5);
    }
}