<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\HotItem;
use App\Product;

use App\Repositories\CategoryRepository;
use App\Repositories\HotItemRepository;
use App\Repositories\ProductRepository;

class DashboardController extends Controller
{
    protected $categories;
    protected $hotItems;
    protected $products;

    protected $hotItemsIdArray = [];

    public function __construct(CategoryRepository $categories, HotItemRepository $hotItems, ProductRepository $products)
    {
        $this->categories = $categories->all();
        $this->hotItems = $hotItems->all();
        $this->products = $products->allPaged();

        $this->createHotItemIdArray();
    }

    public function index(Request $request)
    {
        return view('dashboard/index', [
            "hotItems" => $this->hotItems,
            "categories" => $this->categories,
            "products" => $this->products,
            "hotItemsIdArray" => $this->hotItemsIdArray,
        ]);
    }

    private function createHotItemIdArray()
    {
        foreach ($this->hotItems as $hotItem) {
            array_push( $this->hotItemsIdArray, $hotItem->product->id );
        }
    }

    public function changeHotItems(Request $request)
    {
        $somethingChanged = false;

        foreach ($this->hotItems as $key=>$hotItem){
            $key++;
            $spot = "Spot" . $key;
            
            if ($hotItem->product_id != $request->$spot) {
                $hotItem->delete();

                $newHotItem = new HotItem;
                $newHotItem->position = $key;
                $newHotItem->product_id = $request->$spot;
                $newHotItem->save();

                $somethingChanged = true;
            }
        }

        if ($somethingChanged) {
            return redirect("/admin/dashboard")->with("success", "HotItems successfully changed!");
        }
        
        return back()->withErrors(["There where no items to change"]);
    }

    public function delete(Request $request, Product $product)
    {
        $product->delete();

        return back()->with("success", "Product successfully deleted!");
    }
}
