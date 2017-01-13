<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Faq;

use App\Repositories\CategoryRepository;
use App\Repositories\FaqRepository;

class NewFaqController extends Controller
{
    protected $categories;
    protected $faqs;

    public function __construct(CategoryRepository $categories, FaqRepository $faqs)
    {
        $this->categories = $categories->all();
        $this->faqs = $faqs->all();
    }

    public function index(Request $request)
    {
        return view('newfaq/index', [
            "categories" => $this->categories,
            "faqs" => $this->faqs,
        ]);
    }

    public function store(Request $request)
    {
        $newFaq = new Faq;
        if($request->category != "NULL") {
            $newFaq->category_id = $request->category;
        }
        $newFaq->question = $request->question;
        $newFaq->awnser = $request->answer;
        $newFaq->save();

        return redirect("/admin/dashboard")->with("success", "FAQ successfully created!");
    }

    public function delete(Request $request, Faq $faq)
    {
        $faq->delete();

        return back()->with("success", "Faq successfully deleted!");
    }
}
