@extends('layouts.admin')

@section('content')
<div class="row">
    @if (session('message'))
    <h6 class="alert-alert success">{{ session('message') }},</h6>
      
    @endif
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>Category
        <a href="{{ url('admin/create_category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
    </h3>
</div>
<div class="card-body">
    
    <table class="table table-dark">
      <thead>
        <tr>
            <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
      </thead>
      <tbody> 
        @foreach ($categories as $category )
            
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>@if($category->status==1)
                active
                @else
                inactive
                @endif</td>
            <td><img src="{{ $category->getProfile() }}"style="height: 50px; width: 50px; border-radius:50px ;"></td>
            @if(!empty($category->getProfile()))

             
            @endif
            <td>
                <a href="{{url('admin/edit_category/'.$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{url('admin/edit_category/delete/'.$category->id)}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
      </tbody> 
    </table>

</div>

    </div>

</div>
    
</div>



@endsection