<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $categories;
    protected $hotItems;

    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        return view('admin/index', [
        ]);
    }
}
