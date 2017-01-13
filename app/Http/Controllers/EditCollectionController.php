<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Collection;


class EditCollectionController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request, Collection $collection)
    {
        return view('editcollection/index', [
            "collection" => $collection,
        ]);
    }

    public function edit(Request $request, Collection $collection)
    {
        $newCollection = $collection;
        $newCollection->name = $request->name;
        $newCollection->save();

        return redirect("/admin/dashboard")->with("success", "Collection successfully edited!");
    }

    public function delete(Request $request, Collection $collection)
    {
        $collection->delete();

        return back()->with("success", "Collection successfully deleted!");
    }
}
