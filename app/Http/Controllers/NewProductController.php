<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Picture;
use App\Size;
use App\Color;
use App\Faq;

use App\Repositories\CategoryRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\FaqRepository;

class NewProductController extends Controller
{
    protected $categories;
    protected $collections;
    protected $faqs;

    public function __construct(CategoryRepository $categories, CollectionRepository $collections, FaqRepository $faqs)
    {
        $this->categories = $categories->all();
        $this->collections = $collections->all();
        $this->faqs = $faqs->all();
    }

    public function index(Request $request)
    {
        return view('newproduct/index', [
            "categories" => $this->categories,
            "collections" => $this->collections,
            "faqs" => $this->faqs,
        ]);
    }

    public function store(Request $request)
    {//dd($request);
         $this->validate($request, [
            "category" => "required",
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "technical_description" => "required",

            "color" => "required",

            "image" => "required",

            "size_name" => "required",
            "width" => "required",
            "length" => "required",
            "height" => "required",
        ]);

        $newProduct = new Product;
        $newProduct->category_id = $request->category;
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;
        $newProduct->technical_description = $request->technical_description;
        $newProduct->save();

        $this->storeImage($request->file("image"), $newProduct->id);
        $this->storeSize($newProduct->id, $request->size_name, $request->width, $request->length, $request->height);
        $this->storeColor($newProduct->id, $request->color);

        if ($request->collections) {
            foreach ($request->collections as $key=>$value) {
                $this->createCollectionLinks($newProduct, $key);
            }
        }

        if ($request->faqs) {
            foreach ($request->faqs as $key=>$value) {
                $this->createFaqLinks($newProduct, $key);
            }
        }

        return redirect("/admin/dashboard")->with("success", "Product successfully created!");
    }

    public function changeHotItems(Request $request)
    {
        if ($somethingChanged) {
            return redirect("/admin/dashboard")->with("success", "HotItems successfully changed!");
        }
        
        return back()->withErrors(["There where no items to change"]);
    }






    private function storeImage($file, $id)
    {
        //$url = $file->store("../images");
        $url = $file->store("images", "upload");

        $newPicture = new Picture;
        $newPicture->product_id = $id;
        $newPicture->url = $url;
        $newPicture->save();
    }

    private function storeSize($id, $name, $width, $length, $height)
    {
        $newSize = new Size;
        $newSize->product_id = $id;
        $newSize->name = $name;
        $newSize->width = $width;
        $newSize->length = $length;
        $newSize->height = $height;
        $newSize->save();
    }

    private function storeColor($id, $color)
    {
        $newColor = new Color;
        $newColor->product_id = $id;
        $newColor->hex_color = $color;
        $newColor->save();
    }

    private function createCollectionLinks($product, $id)
    {
        $product->collections()->attach($id);
    }

    private function createFaqLinks($product, $id)
    {
        $product->faqs()->attach($id);
    }
}
