<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Collection;

use App\Repositories\CollectionRepository;

class NewCollectionController extends Controller
{
    protected $collections;

    public function __construct(CollectionRepository $collections)
    {
        $this->collections = $collections->all();
    }

    public function index(Request $request)
    {
        return view('newcollection/index', [
            "collections" => $this->collections,
        ]);
    }

    public function store(Request $request)
    {
        $newCollection = new Collection;
        $newCollection->name = $request->name;
        $newCollection->save();

        return redirect("/admin/dashboard")->with("success", "Collection successfully created!");
    }

    public function delete(Request $request, Collection $collection)
    {
        $collection->delete();

        return back()->with("success", "Collection successfully deleted!");
    }
}
