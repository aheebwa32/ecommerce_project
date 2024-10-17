<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        // $sliders=Slider::where('status','1')->get();
        $products=Product::where('status','1')->take(5)->get();
        $productimages=ProductImage::get();
        $categories=Category::where('status','1')->take(5)->get();
        return view('frontend.index',compact('productimages','products','categories'));
    }

    public function category(){
       $categories=Category::where('status','1')->take(5)->get();
        return view('frontend.category',compact('categories'));
    }
    public function view_category($id){
        if(Category::where('id',$id)->exists()){
           $category=Category::where('id',$id)->first();
           $products=Product::where('category_id',$category->id)->where('status','1')->get();
           return view('frontend.view_category',compact('category','products'));
        }else{
            return redirect('/');
        }
    }

    public function view_product($product_id,$category_id){
        if(Category::where('id',$category_id)->exists()){
            $products=Product::where('id',$product_id)->first();
            return view ('frontend.view_product',compact('products'));
        }else{
            return redirect('/');
        }
    }
}
