<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;
use App\Models\Slider;
use Str;
use Auth;

class SliderController extends Controller
{
    function slider() {
        $sliders=Slider::all();
        return view('administrator.slider',compact('sliders'));
    }
    function create_slider(){
       return view('administrator.create_slider');
    }
    public function insert_slider(Request $request){
        request()->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'status'=>'required|string',
            'image'=>'required|mimes:jpeg,jpg,png'
           ]);
           $sliders= new Slider ;
           $sliders->name=$request->name;
           $sliders->description=$request->description;
           $sliders->image=$request->image;
           $sliders->status=$request->status==true?'1':'0';

           
           if (!empty($request->file('image'))) {
              $ext=$request->file('image')->getClientOriginalExtension();
              $file=$request->file('image');
              $randomStr=Str::random(20);
              $filename=strtolower($randomStr).'.'.$ext;
              $file->move('uploads/Slider/',$filename);
      
              $sliders->image=$filename;  
                   
          }
          $sliders->save();
             
              return redirect('admin/slider');
          
    }
    public function edit_slider(Slider $sliders){
     return view('administrator.edit_slider',compact('sliders'));
    } 
 // Make sure to import the File facade

    public function update_slider(Request $request, $slider_id)
    {
        request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|mimes:jpeg,jpg,png' // The image is not required during update
        ]);
    
        $slider = Slider::findOrFail($slider_id); // Fetch the Slider instance from the database
    
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->status = $request->status == true ? '1' : '0';
        $slider->image=$request->image;
    
        if (!empty($request->file('image'))) {
            // Delete the old image file if it exists
            $destination = 'uploads/Slider/' . $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            // Upload the new image file
            $ext = $request->file()->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('uploads/Slider/', $filename);
    
            $slider->image = $filename;
        }
    
        $slider->save();
    
        return redirect('admin/slider')->with('message', 'Slider updated successfully.');
    }
    
    

       
 public function delete($id){
    $slider=Slider::findOrFail($id);

     if(!empty($slider)){

         //$getRecord->is_deleted=1;

         $slider->delete();

         return redirect()->back();

     } else {
         abort(404);
     }


}
}
