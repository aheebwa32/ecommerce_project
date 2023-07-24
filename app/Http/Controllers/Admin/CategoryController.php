<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Str;

class CategoryController extends Controller
{
    public function category(){
        $categories=Category::all();
        // $data['getRecord'] = Admin::getAdmin();
        return view('administrator.category',compact('categories'));
    }

    public function create_category(){
        return view('administrator.create_category');
    }

    public function insert_category(Request $request){
     request()->validate([
      'name'=>'required|string',
      'description'=>'required|string',
      'status'=>'required|string',
      'image'=>'required|mimes:jpeg,jpg,png'
     ]);
     $categories= new Category;
     $categories->name=$request->name;
     $categories->description=$request->description;
     $categories->status=$request->status==true?'1':'0';
     if (!empty($request->file('image'))) {
        $ext=$request->file('image')->getClientOriginalExtension();
        $file=$request->file('image');
        $randomStr=Str::random(20);
        $filename=strtolower($randomStr).'.'.$ext;
        $file->move('uploads/Category/',$filename);

        $categories->image=$filename;  
             
    }
    $categories->save();
       
        return redirect('admin/category');
    }
    public function edit_category($id)
    {
        $categories['category'] = Category::getSingle($id); 
     return view ('administrator.edit_category',$categories);
      
    }
    

    public function update_category($id){
        request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'status'=>'required|string',
            'image'=>'required|mimes:jpeg,jpg,png'
           ]);
           $categories= Category::getSingle($id);
           $categories->name=$request->name;
           $categories->description=$request->description;
           $categories->status=$request->status==true?'1':'0';
           if (!empty($request->file('image'))) {
              $ext=$request->file('image')->getClientOriginalExtension();
              $file=$request->file('image');
              $randomStr=Str::random(20);
              $filename=strtolower($randomStr).'.'.$ext;
              $file->move('uploads/Category/',$filename);
      
              $categories->image=$filename;  
               
              }
              $categories->save();
      
              return redirect('admin/category');
    
}

       public function delete($id){
       $getRecord = Category::getSingle($id);

        if(!empty($getRecord)){

            //$getRecord->is_deleted=1;

            $getRecord->delete();

            return redirect()->back();

        } else {
            abort(404);
        }
}
}
