<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table ='sliders';

    protected $fillable=([
        'name',
        'description',
        'status',
        'image'
    ]);



    public function getProfile(){

        if (!empty($this->image)&&file_exists('uploads/Slider/'.$this->image)) {
            
           return url('uploads/Slider/'.$this->image);
    
        }else{
    
          return"";
         
        }
   }
}
