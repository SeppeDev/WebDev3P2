<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ProductRepository;
use App\Repositories\CollectionRepository;

class ProductController extends Controller
{
    protected $products;
    protected $collections;

    public function __construct(ProductRepository $products, CollectionRepository $collections)
    {
        $this->products = $products;
        $this->collections = $collections;
    }

    public function index(Request $request, $id)
    {
        $theProduct = $this->products->byId($id);
        $theIds = $this->getCollectionIds($theProduct);

        return view('product/index', [
            "product" => $theProduct,
            "collections" => $this->collections->byIds($theIds, $theProduct->id),
        ]);
    }

    private function getCollectionIds($product)
    {
        $ids = [];

        foreach($product->collections as $collection)
        {
            array_push($ids, $collection->id);
        }

        return $ids;
    }
}
