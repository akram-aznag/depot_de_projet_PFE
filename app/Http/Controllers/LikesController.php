<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like_post (string $post_id,string $user_id){
      
        $liked_post=Like::where('user_id',$user_id)->where('post_id',$post_id)
        ->first();
        if($liked_post){
            return redirect()->back()->with('error','the post is already liked');
        }
        else{
            $like=new Like();
            $like->user_id=$user_id;
            $like->post_id=$post_id;
            $like->save();
            if($like->save()){
                return redirect()->back()->with('success','the post is liked');

            }
            else{
                return redirect()->back()->with('error','the post is not liked');

            }
        }
    }
    public function unlike_post (string $post_id,string $user_id){
        $liked_post=Like::where('user_id',$user_id)->where('post_id',$post_id)->first();
        $liked_post->delete();
        return redirect()->back()->with('success','the post is unliked');
        
        
        
        
}
}