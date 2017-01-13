<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\FaqRepository;

class FaqController extends Controller
{
    protected $faqs;

    public function __construct(FaqRepository $faqs)
    {
        $this->faqs = $faqs;
    }

    public function index(Request $request)
    {
        return view('faq/index', [
            "faqs" => $this->faqs->all(),
            "search" => "",
        ]);
    }

    public function search(Request $request)
    {
        return view('faq/index', [
            "faqs" => $this->faqs->search($request->search),
            "search" => $request->search,
        ]);
    }
}
