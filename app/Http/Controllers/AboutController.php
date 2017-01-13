<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use App\Repositories\FaqRepository;

class AboutController extends Controller
{
    protected $faqs;

    public function __construct(FaqRepository $faqs)
    {
        $this->faqs = $faqs;
    }

    public function index(Request $request)
    {
        return view('about/index', [
            "faqs" => $this->faqs->getNumber(5),
        ]);
    }

    public function message(Request $request)
    {
        $this->sendQuestionMail($request);

        return back()->with("success", "Question successfully sent!");
    }

    private function sendQuestionMail(Request $request)
    {
        Mail::send("mails.questionMail", ["request" => $request], function($message){
            $message->to("goossens.seppe.dev@gmail.com");
            $message->subject("A question for Kowloon");
        });
    }
}
