<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CollectionRepository;

class CategoryController extends Controller
{
    protected $categories;
    protected $products;
    protected $collections;

    public function __construct(CategoryRepository $categories, ProductRepository $products, CollectionRepository $collections)
    {
        $this->categories = $categories;
        $this->products = $products;
        $this->collections = $collections;
    }

    public function index(Request $request, $id)
    {
        return view('category/index', [
            "category" => $this->categories->byId($id),
            "collections" => $this->collections->allWithoutPagination(),
        ]);
    }

    public function filter(Request $request, $id)
    {
        if(count($request->collections) > 0) {
            $category = $this->categories->byId($id);
            $category->products = $this->products->filter($request->collections, [$request->get('min-price'), $request->get('max-price')], $id);
            return view('category/index', [
                "category" => $category,
                "collections" => $this->collections->allWithoutPagination(),
            ]);
        }

        return view('category/index', [
            "category" => $this->categories->byId($id),
            "collections" => $this->collections->allWithoutPagination(),
        ]);
    }
}
