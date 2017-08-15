<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\CategoryRepository;
use App\Repositories\CollectionRepository;

class CategoryController extends Controller
{
    protected $categories;
    protected $collections;

    public function __construct(CategoryRepository $categories, CollectionRepository $collections)
    {
        $this->categories = $categories;
        $this->collections = $collections;
    }

    public function index(Request $request, $id)
    {
        return view('category/index', [
            "category" => $this->categories->byId($id),
            "collections" => $this->collections->allWithoutPagination(),
        ]);
    }
}
