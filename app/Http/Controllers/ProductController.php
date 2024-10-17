<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Auth;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function product(){
        $products=Product::all();
        return view('administrator.product',compact('products'));
    }

    public function create_product(){

        $categories=Category::all();
        return view('administrator.create_product',compact('categories'));
    }
    public function insert_product(Request $request){
        request()->validate([
          'category_id'=>'required|integer',
         'name'=>'required|string',
         'small_description'=>'required|string',
         'status'=>'required|string',
         'price'=>'required|integer',
         'quantity'=>'required|integer',
        //  'image'=>'required|mimes:jpeg,jpg,png'
        ]);
        
        $category = Category::findOrFail($request->category_id);
        $product=$category->product()->create([
            'name' => $request->name,
            'small_description' => $request->small_description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $request->image,
            'price'=>$request->price,
            'quantity'=>$request->quantity
        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            foreach ($request->file('image') as $file) {
                $ext = $file->getClientOriginalExtension();
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->productImage()->create([
                    'product_id'=>$product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        
        // return $product->id;
        return redirect('admin/product')->with('message','product added successfuly');
       }

       public function edit_product(int $product_id){
        $products=Product::findOrFail($product_id);
        $categories=Category::all();
        return view('administrator.edit_product',compact('products','categories'));
       }

       public function update_product(Request $request,$product_id){
        request()->validate([
         "name"=>'required|string',
        'small_description'=>'required|string',
         'status'=>'required|string',
         'price'=>'required|integer',
         'quantity'=>'required|integer',
        ]);
        
        $product=Category::findOrFail($request->category_id)
                          ->product()
                          ->where('id',$product_id)
                          ->first();
                          if ($product) {
                           $product->update([
                                'name' => $request->name,
                                'small_description' => $request->small_description,
                                'status' => $request->status == true ? '1' : '0',
                                'image' => $request->image,
                                'price'=>$request->price,
                                'quantity'=>$request->quantity
                            ]);
                            if ($request->hasFile('image')) {
                                $uploadPath = 'uploads/products/';
                                foreach ($request->file('image') as $file) {
                                    $ext = $file->getClientOriginalExtension();
                                    $randomStr = Str::random(20);
                                    $filename = strtolower($randomStr) . '.' . $ext;
                                    $file->move($uploadPath, $filename);
                                    $finalImagePathName = $uploadPath . $filename;
                    
                                    $product->productImage()->create([
                                        'product_id'=>$product->id,
                                        'image' => $finalImagePathName,
                                    ]);
                                }
                            }
                    
                            $product->save();
                    
                            return redirect('admin/product')->with('success', 'Product updated successfully.');
                        } else {
                            return redirect()->back()->with('error', 'Product not found.');
                        }
       }


       public function delete($id){
        $product=Product::findOrFail($id);
 
         if(!empty($product)){
 
             //$getRecord->is_deleted=1;
 
             $product->delete();
 
             return redirect()->back();
 
         } else {
             abort(404);
         }
    

    }

}