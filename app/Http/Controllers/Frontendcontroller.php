<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class Frontendcontroller extends Controller
{
    public function index(){
        $sliders=Slider::where('status','1')->get();
        return view('frontend.index',compact('sliders'));
    }
}
