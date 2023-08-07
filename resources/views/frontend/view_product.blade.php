@extends('layouts.app')

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">{{ $products->category->name }} / {{ $products->name }}</h6>
    </div>
</div>
<div class="container">
    <div class="card-shadow" product_info>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ $products->productImage }}" alt="{{ $products->name }}">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">{{ $products->name }}</h2>
                    @if ($products->status == '1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag">Trending</label>
                    @endif
                    <hr>
                    <label class="me-3">Selling Price: Ugx{{ $products->price }}</label>
                    <p class="mt-3">
                        {{ $products->small_description }}
                    </p>
                    <hr>
                    @if ($products->quantity > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $products->id }}" class="product_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <span class="input-group-text">-</span>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center" />
                                <span class="input-group-text">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success  me-3 float-start">Add To List <i class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){

     $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var product_id=$(this).closest('.product_info').find('.product_id').val()
        var quantity=$(this).closest('.product_info').find('.qty-input').val()
        alert(product_id)
        alert(quantity)
     });  
    })
</script>

@endsection
