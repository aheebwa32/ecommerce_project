@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trendng bracelets</h2>
            @foreach ($categories as $category)
                <div class="col-md-3">
                    <a href="{{ url('frontend/view_category/'.$category->id) }}">
                    <div class="card">
                        <img src="{{ $category->getProfile() }}" style="height: 100px; width: 100px; border-radius:50px ;"> 
                        <div class="card-body">
                            <h4>{{ $category->name }}</h4> 
                            {{ $category->description }}   
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
