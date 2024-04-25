@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px;width:fit-content;">
    <h1 class="text-center" style="font-size: 27px"> Categories List</h1>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>category name</th>
                    <th>category title</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->title}}</td>
                    
                    <td>
                        <a href="{{route('edit_category',['id'=>$category->id])}}" class="btn btn-success">edit</a>
                        <a href="{{route('delete_category',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('show_category',['id'=>$category->id])}}" class="btn btn-primary" role="button">detaile</a>

                    </td>
                  

                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection