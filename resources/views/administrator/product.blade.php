@extends('layouts.admin')

@section('content')
<div class="row">
    @if (session('message'))
    <div class="alert-alert success">{{ session('message') }}</div>
      
    @endif
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>Product
        <a href="{{ url('admin/create_product') }}" class="btn btn-primary btn-sm float-end">Add product</a>
    </h3>
</div>
<div class="card-body">
    <div class="table-responsive  pt-3">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>ID</th>
              <th>CATEGORY</th>
              <th>product</th>
              <th>PRICE</th>
              <th>QUANTITY</th>
              <th>STATUS</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>@if($product->status==1)
                    active
                    @else
                    inactive
                    @endif</td>
                    <td>
                        <a href="{{url('admin/edit_product/'.$product->id)}}" class="btn btn-sm btn-primary ">Edit</a>
                        <a href="{{url('admin/edit_product/delete/'.$product->id)}}" onclick="return confirm('are you want to delete this product')" class="btn btn-sm btn-danger ">Delete</a>
                    </td>
            </tr> 
           
            @endforeach
           
          </tbody>
</div>
</div>
</div>
</div>



@endsection