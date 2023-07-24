<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    // use HasFactory;
protected $table='categories';

protected $fillable=[
'name',
'decription',
'status',
'image'
];


static public function getCategory(){
    $return = self::select('users.*')
    
    ->get();

   }


static public function getSingle($id){
    return self::find($id);
}

public function getProfile(){

    if (!empty($this->image)&&file_exists('uploads/Category/'.$this->image)) {
        
       return url('uploads/Category/'.$this->image);

    }else{

      return"";
     
    }
}



public function product(){
    return $this->hasMany(Product::class,'category_id','id');
}
}
