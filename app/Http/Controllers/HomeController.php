<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;
use Mail;

use App\Subscriber;

use App\Repositories\CategoryRepository;
use App\Repositories\HotItemRepository;

class HomeController extends Controller
{
    protected $categories;
    protected $hotItems;

    public function __construct(CategoryRepository $categories, HotItemRepository $hotItems)
    {
        $this->categories = $categories->all();
        $this->hotItems = $hotItems->all();
    }

    public function index(Request $request)
    {
        //dd(App::getLocale());

        return view('home/index', [
        	"hotItems" => $this->hotItems,
            "categories" => $this->categories,
        ]);
    }

    public function store(Request $request)
    {
            $newSubscriber = new Subscriber;
            $newSubscriber->email = $request->email;
            $newSubscriber->save();


    		$this->sendSubscriptionMail($request);
    		
            return back()->with("success", "Subscription successful");
    }

    private function sendSubscriptionMail(Request $request)
    {
        Mail::send("mails.subscriptionMail", [], function($message) use ($request){
            $message->to($request->email);
            $message->subject("You just subscribed to Kowloons newsletter!");
        });
    }
}
