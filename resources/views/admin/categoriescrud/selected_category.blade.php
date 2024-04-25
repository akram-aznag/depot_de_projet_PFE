@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"></h1>
<x-notify::notify />

<div class="table-responsive pt-3 ">
        <table class="table table-bordered">
            <tbody>
              
                <tr><td><span style="font-weight: 700">Category id:</span>{{$category_data->id}}</td></tr>
                <tr><td><span style="font-weight: 700">Category name:</span>{{$category_data->name}}</td></tr>
                <tr><td><span style="font-weight: 700">Category slug:</span>{{$category_data->slug}}</td></tr>
                <tr><td><span style="font-weight: 700">Category title:</span>{{$category_data->title}}</td></tr>
                <tr><td><span style="font-weight: 700">Category meta title:</span>{{$category_data->meta_title}}</td></tr>
                <tr><td> <span style="font-weight: 700">Category description:</span>  {{$category_data->meta_description}}</td></tr>
                <tr><td> <span style="font-weight: 700">Category keywords: </span> {{$category_data->meta_keywords}}</td></tr> 
                <tr>
                    <td>
                            <a href="{{route('edit_category',['id'=>$category_data->id])}}" class="btn btn-primary">edit</a>
                            <a href="{{route('delete_category',['id'=>$category_data->id])}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('categories')}}" class="btn btn-light">go back</a>
    
                        </td>
                </tr>  
                  

                    
                </tr>
            
              
            </tbody>
        </table>
    </div>
</div>
@endsection