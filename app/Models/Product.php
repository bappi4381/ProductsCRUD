<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $image,$imageUrl,$product,$imageName,$directory,$extention;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$extention    = self::$image->getClientOriginalName();
        self::$imageName    = 'product_'.time().'.'.self::$extention;
        self::$image->storeAs('public', self::$imageName);
        //self::$image->move($directory,self::$imageName);
        return self::$imageName;
    }
    
    public static function newProduct($request){
        self::$product = new product();
        self::$product->title= $request->title;
        self::$product->fee = $request->fee;
        self::$product->description = $request->description;
        self::$product->image = self::getImageUrl($request);
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);

        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
    public static function updateProduct($request,$id){
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl=self::getImageUrl($request,'storage/public/');
        }
        else
        {
            self::$imageUrl = self::$product->image;

        }
        self::$product->title= $request->title;
        self::$product->fee = $request->fee;
        self::$product->description = $request->description;
        self::$product->image = self::$imageUrl;
        self::$product->save();
    }
}
