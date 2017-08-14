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
use App\Repositories\ProductRepository;

class EditProductController extends Controller
{
    protected $categories;
    protected $collections;
    protected $faqs;
    protected $products;

    public function __construct(CategoryRepository $categories, CollectionRepository $collections, FaqRepository $faqs, ProductRepository $products)
    {
        $this->categories = $categories->all();
        $this->collections = $collections->all();
        $this->faqs = $faqs->all();
        $this->products = $products;
    }

    public function index(Request $request, $id)
    {
        return view('editproduct/index', [
            "categories" => $this->categories,
            "collections" => $this->collections,
            "faqs" => $this->faqs,
            "product" =>$this->products->byIdWithAll($id),
        ]);
    }

    public function edit(Request $request, Product $product)
    {
        $this->validate($request, [
            "category" => "required",
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "technical_description" => "required",
        ]);

        $newProduct = $product;
        $newProduct->category_id = $request->category;
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;
        $newProduct->technical_description = $request->technical_description;
        $newProduct->save();

        /*$this->storeImage($request->file("image"), $newProduct->id);
        $this->storeSize($newProduct->id, $request->size_name, $request->width, $request->length, $request->height);
        $this->storeColor($newProduct->id, $request->color);

        foreach ($request->collections as $key=>$value) {
            $this->createCollectionLinks($newProduct, $key);
        }

        foreach ($request->faqs as $key=>$value) {
            $this->createFaqLinks($newProduct, $key);
        }*/

        return back()->with("success", "Product successfully updated!");
    }

    public function storeNewSize(Request $request, Product $product)
    {
        $this->validate($request, [
            "size_name" => "required",
            "width" => "required",
            "length" => "required",
            "height" => "required",
        ]);

        $this->storeSize($product->id, $request->size_name, $request->width, $request->length, $request->height);
        
        return back()->with("success", "Size successfully created");
    }

    public function deleteSize(Request $request, Size $size)
    {
        $size->delete();

        return back()->with("success", "Size successfully deleted!");
    }

    /*COLOR*/
    public function storeNewColor(Request $request, Product $product)
    {
         $this->validate($request, [
            "color" => "required",
        ]);

        $this->storeColor($product->id, $request->color);
        
        return back()->with("success", "Color successfully created");
    }

    public function deleteColor(Request $request, Color $color)
    {
        $color->delete();

        return back()->with("success", "Color successfully deleted!");
    }

    /*Image*/
    public function storeNewImage(Request $request, Product $product)
    {
         $this->validate($request, [
            "image" => "required",
        ]);

        $this->storeImage($request->file("image"), $product->id);
        
        return back()->with("success", "Image successfully created");
    }

    public function deleteImage(Request $request, Picture $picture)
    {
        $picture->delete();

        return back()->with("success", "Image successfully deleted!");
    }

    /*Collection*/
    public function editCollections(Request $request, Product $product)
    {
        foreach ($request->collections as $key1=>$newCollectionId) {
            $alreadyExists = false;

            foreach($product->collections as $key2=>$oldCollection) {
                if($newCollectionId == $oldCollection->id) {
                    $alreadyExists = true;
                }
            }

            if(!$alreadyExists) {
                $this->createCollectionLinks($product, $newCollectionId);
            }
        }

        foreach ($product->collections as $key3=>$oldCollection) {
            $toBeDeleted = true;

            foreach($request->collections as $key4=>$newCollectionId) {
                if($oldCollection->id == $newCollectionId) {
                    $toBeDeleted = false;
                }
            }

            if($toBeDeleted) {
                $this->destroyCollectionLinks($product, $oldCollection->id);
            }
        }
        
        return back()->with("success", "Collections successfully updated");
    }






    private function storeImage($file, $id)
    {
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

    private function destroyCollectionLinks($product, $id)
    {
        $product->collections()->detach($id);
    }

    private function createFaqLinks($product, $id)
    {
        $product->faqs()->attach($id);
    }
}
