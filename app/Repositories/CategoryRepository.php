<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function all()
    {
        return Category::get();
    }

    public function byId($id)
    {
        return Category::where("id", $id)
                    ->with("products")
                    ->first();
    }
}