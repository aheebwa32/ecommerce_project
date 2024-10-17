@extends('layouts.admin')

@section('content')
<div class="row">
<div class="col-md-12">
    
    <div class="card">
   <div class="card-header">
    <h3>Add new slider
        <a href="{{ url('admin/slider') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
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
    <form method="post" action="{{ url('admin/slider') }}" enctype="multipart/form-data">
        @csrf
        <div class=" col-md-6 mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="name" required>
          </div>
          <div class="col-md-12 mb-3">
            <label>Description</label>
           <textarea class="form-control" name="description" placeholder="descripton" required rows="3">
          </textarea>
          <div class="col-md-6 mb-3">
            <label>Status
              <span style="color: purple;"></span>
            </label>
            <select class="form-control" required name="status">
              <option  value="">Select Status</option>
              <option value="status">active</option>
             <option value="status">inactive</option>
            </select>
          </div>
          <div class=" col-md-6 mb-3">
            <label>Image<span style="color: purple;"></span></label>
            <input type="file" class="form-control" name="image" value="image" >
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">create</button>
          </div>

    </form>

</div>

    </div>

</div>
    
</div>

@endsection