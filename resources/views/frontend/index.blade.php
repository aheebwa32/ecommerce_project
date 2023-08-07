@extends('layouts.app')

@section('title','Home page')
@section('content')
{{-- @include('layouts.includes.slider') --}}
 <div class="py-5">
  <div class="container">
  <div class="row">
    <h2>Popular Bracelets</h2>
    @foreach ($products as $product )
    <div class="col-md-3">
      
     <div class="card">
      @if ($product->productImage)
      @foreach ($product->productImage as $image)
          
      @endforeach
     <img src="{{asset('$image')}}" style="width:80px;height:80px;" class="me-4" alt="Img">
     @else
     <h5>
         No Image Found.
     </h5>
     <a href="">Remove</a>
     @endif
      <div class="card-body">
      <h5>{{ $product->name }}</h5>
      <small>{{ $product->price }}</small>
      </div>
    </div>
  
    </div>
    @endforeach
  </div>
  </div>

 </div>
 <div class="py-5">
  <div class="container">
  <div class="row">
    <h2>Trending categories</h2>
    @foreach ($categories as $category )
    <div class="col-md-3">
      <a href="{{ url('frontend/view_category/'.$category->id) }}">
     <div class="card">
     
     <img src="{{$category->getProfile()}}" style="width:80px;height:80px;" class="me-4" alt="Img">
     
      <div class="card-body">
      <h5>{{ $category->name }}</h5>
      <small>{{ $category->price }}</small>
      </div>
    </div>
  </a>
    </div>
    @endforeach
  </div>
  </div>

 </div>
@section('scripts')

@endsection




{{-- <div id="carouselExampleCaptions" class="carousel slide">
    @foreach ($sliders as $key=> $sliderItem )
        
 
    <div class="carousel-inner">
      <div class="carousel-item {{ $key==1?'active':'' }}">
        @if ($sliderItem->getProfile())
            
        
        <img src="{{$sliderItem->getProfile() }}" class="d-block w-100" style="width:2000px;height:1000px">
        @endif
        {{-- <div class="carousel-caption d-none d-md-block">
          <h5>{{ $sliderItem->name }}</h5>
          <p>{{ $sliderItem->description }}</p>
        </div> --}}
        {{-- <div class="carousel-caption d-none d-md-block">
            <div class="custome-carousel-content">
                <h1>{{$sliderItem->name }}</h1>
                <p>{{ $sliderItem->description }}</p>
              <div>
                <a href="" class="btn btn-slider">Get Now</a>
              </div>
            </div>

        </div>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>  --}}

@endsection