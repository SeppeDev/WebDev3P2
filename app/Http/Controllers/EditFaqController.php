<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Faq;

use App\Repositories\CategoryRepository;

class EditFaqController extends Controller
{
    protected $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories->all();
    }

    public function index(Request $request, Faq $faq)
    {
        return view('editfaq/index', [
            "categories" => $this->categories,
            "faq" => $faq,
        ]);
    }

    public function edit(Request $request, Faq $faq)
    {
         $this->validate($request, [
            "question" => "required",
            "answer" => "required",
        ]);

        $newFaq = $faq;
        if($request->category != "NULL") {
            $newFaq->category_id = $request->category;
        }
        else {
            $newFaq->category_id = null;
        }
        $newFaq->question = $request->question;
        $newFaq->awnser = $request->answer;
        $newFaq->save();

        return redirect("/admin/dashboard")->with("success", "FAQ successfully edited!");
    }

    public function delete(Request $request, Faq $faq)
    {
        $faq->delete();

        return back()->with("success", "Faq successfully deleted!");
    }
}
