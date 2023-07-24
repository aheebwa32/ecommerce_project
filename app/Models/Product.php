<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable=[
       'category_id',
        'name',
        'small_description',
        'price',
        'quantity',
        'status',

    ];

    public function productImage(){
return $this->hasMany(ProductImage::class,'product_id','id');
    
}

public function category(){
    return $this->belongsTo(Category::class,'category_id','id');
}
}