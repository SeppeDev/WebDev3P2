<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ProductRepository;

class SearchController extends Controller
{
    protected $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    public function index(Request $request)
    {
        return view('search/index', [
            "products" => $this->products->allPaged(),
            "search" => "",
        ]);
    }

    public function search(Request $request)
    {
        $price = [50, 60];
        $categories = [1, 2, 3, 4, 5];

        return view('search/index', [
            "products" => $this->products->search($request->search, $price, $categories),
            "search" => $request->search,
        ]);
    }
}
