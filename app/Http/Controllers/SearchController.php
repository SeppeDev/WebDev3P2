<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;

class SearchController extends Controller
{
    protected $products;
    protected $categories;

    public function __construct(ProductRepository $products, CategoryRepository $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function index(Request $request)
    {
        return view('search/index', [
            "products" => $this->products->allPaged(),
            "categories" => $this->categories->all(),
            "search" => "",
        ]);
    }

    public function search(Request $request)
    {
        if(count($request->categories) > 0) {
            return view('search/index', [
                "products" => $this->products->search($request->search, [$request->get('min-price'), $request->get('max-price')], $request->categories),
                "categories" => $this->categories->all(),
                "search" => $request->search
            ]);
        }
    }
}
