<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function delete_bloger_comments(string $id){
        $comment=Comment::where('id',$id)->first();
        $comment->delete();
        return redirect()->back()->with('success','the comment is deleted successfully');
    }

    public function show_bloger_comments(){
        $user=User::where('id',Auth::user()->id)->first();
        
        $posts=Post::get();
        foreach($posts as $post){
            $comments=Comment::where('user_id',$user->id)->where('post_id',$post->id)->get();
        }
        return view('bloger.commentcrud.manage_comments')->with('comments',$comments);
    }

    public function store_comment(Request $request,string $post_id,string $user_id){
        $request->validate([
            'comment'=>'required|string',
        ]);

        $comment=new Comment();
        $comment->comment=$request->comment;
        $comment->post_id=$post_id;
        $comment->user_id=$user_id;
        $comment->save();
        if($comment->save()){
            return redirect()->back()->with('success','the comment is added successfully !');
        }
        else{
            return redirect()->back()->with('error','the comment is not added try !');

        }
           
    }

    public function store_comment_reply(Request $request,string $post_id,string $user_id,string $parent_id){
     //  echo 'the post id :'.$post_id.' the user id'.$user_id.' the parent id comment:'.$parent_id;
     $request->validate([
        'comment_reply'=>'required|string',
    ]);

    $comment=new Comment();
    $comment->comment=$request->comment_reply;
    $comment->post_id=$post_id;
    $comment->user_id=$user_id;
    $comment->parent_id=$parent_id;
    $comment->save();
    if($comment->save()){
        return redirect()->back()->with('success','the reply is added  !');
    }
    else{
        return redirect()->back()->with('error','the comment is not added  !');

    }
       
     
           
    }
    public function store_comment_reply_reply(Request $request,string $post_id,string $user_id,string $parent_id){
    
      echo 'the post id :'.$post_id.' the user id'.$user_id.' the parent id comment reply:'.$parent_id;
       $request->validate([
            'comment_reply_reply'=>'required|string',
        ]);
   
     $comment=new Comment();
    $comment->comment=$request->comment_reply_reply;
    $comment->post_id=$post_id;
    $comment->user_id=$user_id;
    $comment->parent_id=$parent_id;
    $comment->save();
    if($comment->save()){
    return redirect()->back()->with('success','the reply of the comment reply is added  !');
    }
    else{
     return redirect()->back()->with('error','the comment is not added  !');
    }
          
        
              
       }
   
}
