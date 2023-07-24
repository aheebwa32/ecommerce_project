@extends('layouts.app')

@section('title','Home page')
@section('content')

{{-- <div id="carouselExampleCaptions" class="carousel slide"> --}}
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
        <div class="carousel-caption d-none d-md-block">
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
  </div>

@endsection