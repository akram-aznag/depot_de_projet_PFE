@extends('admin.admin_dashboard')
@section('admin')
<div class="card" style="margin-top: 100px">
  <x-notify::notify />
  <div class="card-body container">
    
    <h6 class="card-title">edit category Form</h6>


    <form class="forms-sample row" method="POST" action="{{route('update_category',['id'=>$category_data->id])}}" enctype="multipart/form-data">
      @csrf
  
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputUsername2" value="{{$category_data->name}}">
            @error('name')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category slug:</label>
          <div class="col-sm-9">
            <input type="text"  name="slug" class="form-control @error('slug') is-invalid @enderror" id="exampleInputUsername2"  value="{{$category_data->slug}}">
            @error('slug')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category title</label>
          <div class="col-sm-9">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" value="{{$category_data->title}}">
            @error('title')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category meta title</label>
          <div class="col-sm-9">
            <input type="text" name="meta_title"  class="form-control @error('meta_title') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" value="{{$category_data->meta_title}}">
            @error('meta_title')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Category description</label>
          <div class="col-sm-9">
            <input type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="exampleInputMobile" value="{{$category_data->meta_description}}">
            @error('meta_description')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
          <div class="row mb-3">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category keywords</label>
            <div class="col-sm-9">
              <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off" value="{{$category_data->meta_keywords}}">
              @error('meta_keywords')
              <span class="text-danger">
  
                {{$message}}
              </span>
              @enderror
            </div>
          </div>
          <div class="d-flex">
            
            <button type="submit" class="btn btn-primary me-2">Update</button>
            <button class="btn btn-secondary" type="reset">Cancel</button>
          </div>
        </div>
      
      

    
      
    </form>

  </div>
</div>
@endsection