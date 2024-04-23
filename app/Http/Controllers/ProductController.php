<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $products,$product;
    public function create(Request $request){
        Product::newProduct($request);
        return redirect('/')->with('message','Product create successfully');
    }
    public function delete($id){
        Product::deleteProduct($id);
        return redirect('/show')->with('message','');
    }
    public function edit($id){
        $products = Product::find($id);
        return view ('home.edit',compact('products'));
    }
    public function update(Request $request,$id){
        Product::updateProduct($request,$id);
        return redirect('/show')->with('status','Product update successfully');
    }
}
