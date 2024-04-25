<?php

namespace App\Http\Controllers;

use App\Mail\AcceptBlog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    //admin blogs
    public function show_admin_blogs(){
        $posts = Post::whereHas('user', function ($query) {
            $query->where('role', 'admin');
        })->get();
        return view('admin.adminpostcrud.show_posts')->with('posts',$posts);

    }
    public function show_admin_blog(string $post_id){
        $post= Post::where('id',$post_id)->first();
        return view('admin.adminpostcrud.selected_post')-> with('post_data',$post);
    }
    public function create_admin_blog(){
        $categories=Category::get();
        return view('admin.adminpostcrud.add_post')->with('categories',$categories);
    }


    public function show_blogs(){
        $posts = Post::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })->get();
        return view('admin.postscrud.show_posts')->with('posts',$posts);
    }
    public function get_blog(string $post_id){
        $post= Post::where('id',$post_id)->first();
        return view('admin.postscrud.selected_post')-> with('post_data',$post);
    }
    public function create_blog(){
        $categories=Category::get();
        return view('admin.postscrud.add_post')->with('categories',$categories);
    }
    public function add_blog(Request $request,string $admin_id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'category' => 'required',
        ]);
        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title) . '-' . $post->id;
        $post->description = $request->description;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->user_id = $admin_id;
        $post->is_published='yes';
        $post->category_id = $request->category;
        $post->updated_at = now();
        
       if($request->hasFile('photo')){
           $file=$request->file('photo');
           $filename=date('YmdHis').'-'.$file->getClientOriginalName();
           $file->move(public_path('/upload/blog_images'),$filename);
           $post->photo=$filename;
        
           
       };
        $post->save();
       if($post->save()){

             notify()->success('the post is added successfully !');
        }
        else{
             notify()->error('error','the post is added  updated try again !');
             return redirect()->back();


        }
        return redirect()->route('posts');
    }
    public function delete_blog(string $id){
        $post=Post::where('id',$id)->first();
        $post->delete();
        foreach($post->comments as $comment){
            Comment::where('post_id',$comment->post->id)->where('user_id',$comment->post->user->id)->delete();
        };
        notify()->warning('the post is deleted !');
        return redirect()->back();
    }
    public function edit_blog(string $id){
        $post=Post::where('id',$id)->first();
        $categories=Category::get();

        return view('admin.postscrud.edit_post',['post_data'=>$post,'categories'=>$categories]);

    }
    public function update_blog(Request $request,string $post_id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'category' => 'required',
            'post_state'=>'required'
        ]);
        
        $post = Post::where('id',$post_id)->first();
        $post->update([
            
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' .$post_id,
            'description' => $request->description,
            'meta_description '=>$request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_published'=>$request->post_state,
            'category_id' => $request->category,
            'updated_at '=>now(),
        ]);
        
       if($request->hasFile('photo')){
           $file=$request->file('photo');
           $filename=date('YmdHis').'-'.$file->getClientOriginalName();
           $file->move(public_path('/upload/blog_images'),$filename);
           $post->update(['photo'=>$filename]);
        
           
       };
        $post->save();
       if($post->save()){
        
            Mail::to($post->user->email)->send(new AcceptBlog($post));
             notify()->success('the post is updated successfully !');
        }
        else{
             notify()->error('error','the post is not  updated try again !');
             return redirect()->back();


        }
        return redirect()->route('posts');
    }
    public function manage_blogers_comments(){
        $comments_data= Comment::whereHas('user',function($query){
             $query->where('role','user');
         })->get();
         return view('admin.commentscrud.show_comments')->with('comments',$comments_data);
    }
    public function blogers_comments_details(string $comment_id){
        $comment_data=Comment::where('id',$comment_id)->first();
        return view('admin.commentscrud.selected_comment')->with('comment',$comment_data);
    }
    public function delete_blog_comment(string $comment_id){
        $deleted_comment=Comment::where('id',$comment_id)->first();
        $deleted_comment-> delete();
        notify()->warning('the comment '.$deleted_comment->comment.' is deleted !');
        return redirect()->back();
    }
}
