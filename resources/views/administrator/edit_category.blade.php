@extends('layouts.admin')

@section('content')
<div class="row">
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>Edit Category
        <a href="{{ url('admin/edit_category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
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
    <form method="post" action="{{ url('admin/category/'.$category->id ) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" col-md-6 mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}" placeholder="name" required>
          </div>
          <div class="col-md-12 mb-3">
            <label>Description</label>
           <textarea class="form-control" name="description" value="{{old('description',$category->description)}}" placeholder="descripton" required rows="3">
          </textarea>
          <div class="col-md-6 mb-3">
            <label>Status
              <span style="color: purple;"></span>
            </label>
            <select class="form-control" required name="status">
              <option  value="">Select Status</option>
              <option {{ old('status',$category->status) == 1? 'selected' : ''}} value="1" value="status">active</option>
             <option {{ old('status',$category->status)== 0? 'selected' : ''}} value="0" value="status">inactive</option>
            </select>
          </div>
          <div class=" col-md-6 mb-3">
            <label>Image<span style="color: purple;"></span></label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}" >
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