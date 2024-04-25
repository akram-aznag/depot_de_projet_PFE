<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_categories(){
        $data_categories=Category::get();
        return view('admin.categoriescrud.show_categories')->with('categories',$data_categories);
    }
    public function show_category(string $id){
       $data_category= Category::where('id',$id)->first();
       return view('admin.categoriescrud.selected_category')->with('category_data',$data_category);

    }
    public function edit_category(string $id){
        $data_category= Category::where('id',$id)->first();
       return view('admin.categoriescrud.edit_category')->with('category_data',$data_category);

    }
    public function update_category(Request $request,string $id){
    
        $request->validate([
            'name'=>'required|string|min:5',
            'slug'=>'required|string|min:5',
            'title'=>'required|string|min:5',
            'meta_title'=>'required|string|min:5',
            'meta_description'=>'required|string|min:10',
            'meta_keywords'=>'required|string|min:3',
        ],
        [
         'name.min'=>'the least lenght required is 5' ,  
         'slug.min'=>'the least lenght required is 3' ,  
         'title.min'=>'the least lenght required is 5' ,  
         'meta_title.min'=>'the least lenght required is 5' ,  
         'meta_description.min'=>'the least lenght required is 10' ,  
         'meta_keywords.min'=>'the least lenght required is 3' ,  
        ]
    );
        $result=  Category::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'title'=>$request->title,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
        ]);
        if($result){
            notify()->success('the '.$request->name.' category is updated successfully');

        }
        else{
            notify()->error('the '.$request->name.' is not updated try again !');
        }
        return redirect()->back();
    }
    public function delete_category(string $id){
        $category=Category::where('id',$id)->first();
        $is_deleted=$category->delete();
        if($is_deleted){
            notify()->warning('the '.$category->name.' is deleted!');
        }
        else{
            notify()->info('the '.$category->name.' is not deleted try again!');

        }
        return redirect()->back();

    }
    public function create_category(){
        return view('admin.categoriescrud.add_category');

    }

    public function add_category(Request $request){
        $request->validate([
            'name'=>'required|string|min:5',
            'slug'=>'required|string|min:5',
            'title'=>'required|string|min:5',
            'meta_title'=>'required|string|min:5',
            'meta_description'=>'required|string|min:10',
            'meta_keywords'=>'required|string|min:3',
        ],
        [
         'name.min'=>'the least lenght required is 5' ,  
         'slug.min'=>'the least lenght required is 3' ,  
         'title.min'=>'the least lenght required is 5' ,  
         'meta_title.min'=>'the least lenght required is 5' ,  
         'meta_description.min'=>'the least lenght required is 10' ,  
         'meta_keywords.min'=>'the least lenght required is 3' ,  
        ]
    );
        $result= Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'title'=>$request->title,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
        ]);
        if($result){
            notify()->success('the '.$request->name.' category is added successfully  !');

        }
        else{
            notify()->error('the '.$request->name.' is not added try again !');
        }
        return redirect()->route('categories');
    }
    public function get_category_result(Request $request){
       $cat=Category::where('id',$request->category)->first();
       $get_posts_category=Post::where('category_id',$request->category)->get();
       return view('bloger.categorypages.blogcategories',['posts_category'=>$get_posts_category,'CATEGORY'=>$cat]);
        
    }
}
