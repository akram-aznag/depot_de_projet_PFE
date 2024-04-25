@extends('admin.admin_dashboard')
@section('admin')
<div class="card" style="margin-top: 100px">
  <x-notify::notify />
  <div class="card-body container">
    
    <h6 class="card-title">Horizontal Form</h6>


    <form class="forms-sample row" method="POST" action="{{route('update',['id'=>$user_data->id])}}" enctype="multipart/form-data">
      @csrf
      <div class="col-lg-4">
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputUsername2" placeholder="Email" value="{{$user_data->name}}">
            @error('name')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">User Name</label>
          <div class="col-sm-9">
            <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputUsername2" placeholder="user name" value="{{$user_data->username}}">
            @error('username')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" placeholder="email" value="{{$user_data->email}}">
            @error('email')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Adress</label>
          <div class="col-sm-9">
            <input type="text" name="adress"  class="form-control @error('adress') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" placeholder="adress" value="{{$user_data->adress}}">
            @error('adress')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
          <div class="col-sm-9">
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputMobile" placeholder="Mobile number" value="{{$user_data->phone}}">
            @error('phone')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
      
      </div>

      
      <div class="col-lg-4">

        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off" placeholder="password" >
            @error('password')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
          <div class="col-sm-9">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off" placeholder="confirm password">
            @error('password_confirmation')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Photo</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="image" autocomplete="off" name="photo">
          </div>
        </div>
        <div class="row mb-3">
          <div style="position: relative;left:100px">

            <img id="showimage" style="height: 100px;" src={{
              !empty($user_data->photo)
              ?url('upload/bloger_images/'.$user_data->photo)
              :url('upload/no_image.jpg')
              }} alt="photo">
          </div>
        </div>
        <div class="col-lg-4">

            <div class="form-check mb-3 w-100">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">
              remember me
              </label>
          </div>
         
          <div class="d-flex">
            
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-secondary">Cancel</button>
          </div>
        </div>

        

      </div>
     
      
    </form>

  </div>
</div>
   <script src="{{asset('getimagevalue.js')}}">
   
   </script>

@endsection