@extends('layouts.admin')

@section('content')
<div class="row">
    @if (session('message'))
    <h6 class="alert-alert success">{{ session('message') }},</h6>
      
    @endif
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>Edit product
        <a href="{{ url('admin/product') }}" class="btn btn-danger btn-sm float-end">Back</a>
    </h3>
</div>
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
          @endif
          
        <div class="card-body">
        <form  method="post"action="{{ url('admin/edit_product/'.$products->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
         <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
            Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">
            Product Image
        </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
            Details</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="mb-3">
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}" {{ $category->id==$products->category_id?'selected':'' }}>{{ $category->name }}</option>   
                    @endforeach
                </select>
            </div>
           <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name"value="{{ $products->name }}"  class="form-control">
           </div>
           
           <div class="mb-3">
            <label for="">Description</label>
            <input type="text" name="small_description" class="form-control">
            {{ $products->description }} 
           </div>
        </div>
        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
            <div class="mb-3">
                <label for="">Product image</label>
                <input type="file" multiple class="form-control" name="image[]" id="">

            </div>
            <div>
                 @if ($products->productImage)
                 @foreach ($products->productImage as $image)
                     
                 @endforeach
                <img src="{{asset('$image as image')}}" style="width:80px;height:80px;" class="me-4" alt="Img">
                @else
                <h5>
                    No Image Found.
                </h5>
                <a href="">Remove</a>
                @endif
            
            </div>
           
        </div>
        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                   <label for="">Price</label>
                   <input type="text" name="price"value="{{ $products->price }}" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                   <label for="">Quantity</label>
                   <input type="text" name="quantity"value="{{ $products->quantity }} " class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                   <label for="">Status</label>
                   <select class="form-control" required name="status">
                    <option  value="">Select Status</option>
                    <option {{ $products->status  == 1? 'selected' : ''}} value="status">active</option>
                   <option {{ $products->status  == 0? 'selected' : ''}} value="status">inactive</option>
                  </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>

            </div>
        </div>
      </div>

</div>


@endsection