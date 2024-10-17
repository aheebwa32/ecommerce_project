@extends('layouts.admin')

@section('content')
<div class="row">
    @if (session('message'))
    <div class="alert-alert success">{{ session('message') }}</div>
      
    @endif
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>sliders
        <a href="{{ url('admin/create_slider') }}" class="btn btn-primary btn-sm float-end">Add slider</a>
    </h3>
</div>
<div class="card-body">
    <div class="table-responsive  pt-3">
        <table class="table table-stripped">
          <thead>
            <tr>
                <th>id</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->description}}</td>
                <td><img src="{{$slider->getProfile() }}"style="height: 80px; width: 80px;" alt="slider"></td>
                {{-- @if(!empty($slider->getProfile()))

             
            @endif --}}
                <td>@if($slider->status==1)
                    active
                    @else
                    inactive
                    @endif</td>
                    <td>
                        <a href="{{url('admin/edit_slider/'.$slider->id)}}" class="btn btn-sm btn-primary ">Edit</a>
                        <a href="{{url('admin/edit_slider/delete/'.$slider->id)}}" onclick="return confirm('are you want to delete this slider')" class="btn btn-sm btn-danger ">Delete</a>
                    </td>
            </tr> 
           
            @endforeach
           
          </tbody>
</div>
</div>
</div>
</div>



@endsection