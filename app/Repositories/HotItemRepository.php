<?php

namespace App\Repositories;

use App\HotItem;

class HotItemRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function all()
    {
        return HotItem::with(array("product"=>function($query){
                            $query->select("id", "name", "price", "category_id");
                            $query->with("pictures", "colors");
                        }))
                    ->orderBy('position', 'asc')
                    ->get();
    }
}