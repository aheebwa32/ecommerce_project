@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">
    <div class="row">
      <h2>{{ $category->name }}</h2>
      @foreach ($products as $product )
      <div class="col-md-3">
        <a href="{{ url('frontend/category/'.$category->id.'/'.$product->id) }}">
       <div class="card">
        @if ($product->productImage)
        @foreach ($product->productImage as $image)
            
        @endforeach
       <img src="{{asset('$image')}}" style="width:80px;height:80px;" class="me-4" alt="Img">
       @endif
        <div class="card-body">
        <h5>{{ $product->name }}</h5>
        <small>{{ $product->price }}</small>
        </div>
      </div>
        </a>
      </div>
      @endforeach
    </div>
    </div>
  
   </div>

@endsection