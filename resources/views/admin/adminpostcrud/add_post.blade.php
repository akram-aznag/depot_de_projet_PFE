@extends('admin.admin_dashboard')
@section('admin')
<div class="card" style="margin-top: 140px">
  <x-notify::notify />
  <div class="card-body container">
    
    <h6 class="card-title text-center">add post form</h6>

    <form class="forms-sample row" method="POST" action="{{ route('add_blog',['admin_id'=>Auth::user()->id]) }}" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Post category</label>
          <div class="col-sm-9">
              <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                  <option value="">Choose a category</option>
                  @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Post title</label>
          <div class="col-sm-9">
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername2">
              @error('title')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Post description</label>
          <div class="col-sm-9">
              <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off">
              @error('description')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Post meta_description</label>
          <div class="col-sm-9">
              <input type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off">
              @error('meta_description')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Post meta_keywords</label>
          <div class="col-sm-9">
              <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="exampleInputMobile">
              @error('meta_keywords')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Photo</label>
          <div class="col-sm-9">
              <input type="file" class="form-control" name="photo" id="image" autocomplete="off" name="photo">
          </div>
      </div>
      <div class="row mb-3">
          <div style="position: relative;left:100px">
              <img id="showimage" style="height: 100px;" src='' alt="photo">
          </div>
      </div>
      <div class="d-flex">
          <button type="submit" class="btn btn-primary me-2">Add</button>
          <button class="btn btn-secondary" type="reset">Cancel</button>
      </div>
  </form>
  

  </div>
</div>
<script src="{{asset('getimagevalue.js')}}">
</script>
@endsection