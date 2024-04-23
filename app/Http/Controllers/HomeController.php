<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    private $products,$product;
    public function index() 
    {
        $this->product = Product::all();
        return view('home.index',['products'=>$this->product]);
    }
    public function show() 
    {
        $this->product = Product::all();
        return view('home.show',['products'=>$this->product]);
    }

}
