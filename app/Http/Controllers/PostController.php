<?php

namespace App\Http\Controllers;

use App\Mail\BlogReveiw;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Block;

class PostController extends Controller
{
    public  function create_blog(){
        $categories=Category::get();
        return view('bloger.blogcrud.add_blog')->with('categories',$categories);

    }
    public function add_blog(Request $request, string $user_id)
    {  
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'category' => 'required',
        ]);
    
        $result = new Post();
        $result->title = trim($request->title);
        $result->description = trim($request->description);
        $result->meta_description = trim($request->meta_description);
        $result->meta_keywords = trim($request->meta_keywords);
        $result->category_id = $request->category;
    
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
            $file->move(public_path('/upload/blog_images'), $filename);
            $result->photo = $filename;
        }
    
        $result->user_id = $user_id; // Set the user_id
        $result->created_at = now();
        $slug = Str::slug($request->title);
        $check_slug = Post::where('slug', $slug)->first();
        if ($check_slug) {
            $db_slug = $slug . '-' . $result->id;
        } else {
            $db_slug = $slug;
        }
        $result->slug = $db_slug;
    
        // Save the post
        $result->save();
        if ($result->save()) {
            $post = Post::where('id',$result->id)->first();
            Mail::to($post->user->email)->send(new BlogReveiw($post));
             return redirect()->route('manage_blogs')->with('success', 'The post is created successfully Check your email box for more details!');
        } else {
            return redirect()->route('create-blog')->with('error', 'The post is not created. Please try again!');
        };
    }
    
    public function manage_blogs(){
        $posts=Post::where('user_id',Auth::user()->id)->get();
        return view('bloger.blogcrud.manage_blogs')->with('posts',$posts); 
    }

    public function edit_blog(string $id){
        $post_data=Post::where('id',$id)->first();
        $categories=Category::get();

        return view('bloger.blogcrud.edit_blog',['categories'=>$categories,'post_data'=>$post_data]);
    }
    public function update_blog(Request $request,string $user_id,string $id){

        $request->validate([
             'title' => 'required|string',
             'description' => 'required|string',
             'meta_description' => 'nullable|string',
             'meta_keywords' => 'nullable|string',
             'category' => 'required',
         ]);
        $post= Post::where('id',$id)->first();
        
        $post->update([
            'title'=>$request->title,
            'slug '=>Str::slug($request->title).'-'.$post->id,
            'description'=>$request->description,	
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'user_id'=>$user_id,
            'category_id'=>$request->category,            
            'updated_at'=>now()
     ]);

        
        
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $filename=date('YmdHis').'-'.$file->getClientOriginalName();
            $file->move(public_path( '/upload/blog_images'),$filename);
            $post->update([
                'photo'=>$filename
            ]);
            
        };
         $post->save();
        if($post->save()){

             return redirect()->back()->with('success','the post is updated successfully !');
         }
         else{
             return redirect()->back()->with('error','the post is not  updated try again !');

         }
    
    }
    public function delete_blog(string $id){
        $post=Post::where('id',$id)->first();
        $post->delete();
        foreach($post->comments as $comment){
            Comment::where('post_id',$comment->post->id)->where('user_id',$comment->post->user->id)->delete();
        };
        return redirect()->back()->with('warning','the post is deleted!');

    }
}
