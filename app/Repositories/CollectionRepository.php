<?php

namespace App\Repositories;

use App\Collection;

class CollectionRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function all()
    {
        return Collection::Paginate(5);
    }

    public function allWithoutPagination()
    {
        return Collection::Paginate(5);
    }

    public function byId($id)
    {
        return Collection::where("id", $id)
                    ->first();
    }

    public function byIds($ids, $productId)
    {
        return Collection::whereIn("id", $ids)
                    ->distinct()
                    ->with(array("products"=>function($query) use ($productId){
                            $query->where("products.id", "!=", $productId);
                        }))
                    ->get();
    }
}