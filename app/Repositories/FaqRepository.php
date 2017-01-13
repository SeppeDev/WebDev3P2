<?php

namespace App\Repositories;

use App\FAQ;

class FAQRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function all()
    {
        return FAQ::Paginate(5);
    }

    public function search($value)
    {
        return FAQ::where("question", 'like', '%'.$value.'%')
                        ->orWhere("awnser", 'like', '%'.$value.'%')
                        ->Paginate(5);
    }

    public function getnumber($amount)
    {
        return FAQ::limit($amount)
                        ->get();
    }
}