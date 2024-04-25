<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;


use App\Mail\RegistredMail;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;

class UserCrudController extends Controller
{
    public function show_users(){
        $data=User::where('role','user')-> get();
        return view('admin.usercrud.show_users',['users'=>$data]);
    }
    public function delete_user($id){
        $get_user = User::where('id', $id)->first();
        $get_user->delete();
        
        $posts = Post::where('user_id', $get_user->id)->get();
        foreach ($posts as $post) {
            Comment::where('user_id', $get_user->id)->where('post_id', $post->id)->delete();
            Like::where('user_id', $get_user->id)->where('post_id', $post->id)->delete();
        }
        
        notify()->warning('The user with the name '.$get_user->name.' is deleted');
        return redirect()->back();
    }
    public function edit_user($id){
        $get_user=User::where('id',$id)->first();
        return view('admin.usercrud.edit_user')->with('user_data',$get_user);

      
    }
    public function show_user($id){
        $get_user=User::where('id',$id)->first();
        return view('admin.usercrud.selected_user')->with('user_data',$get_user);

      
    }
    public function update_user(Request $request, $id) {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'adress' => 'required|string',
            'phone' => 'numeric',
            'password' => 'required|confirmed'
        ]);
    
        $user = User::findOrFail($id);
    
        // Update user details
        $result = $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'password' => Hash::make( $request->password),
            'updated_at'=>now()
        ]);
    
        
        if ($result) {
            
    
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
                $file->move(public_path('upload/bloger_images'), $filename);
                $user->update([
                    'photo' => $filename
                ]);
            }
    
            notify()->success('The user ' . $user->name . ' is updated successfully');
        } else {
            notify()->error('The user ' . $user->name . ' is not updated. Please try again');
        }
    
        return redirect()->back();
    }
    public function create_user(){
        return view('admin.usercrud.add_user');
    }
    public function add_user(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'adress' => 'required|string',
            'phone' => 'numeric',
            'password' => 'required|confirmed'
        ]);
    
        $USER=new User();
        $USER ->name= $request->name;
        $USER->username= $request->username;
        $USER->email= $request->email;
        $USER->adress= $request->adress;
        $USER->phone= $request->phone;
        $USER->password= Hash::make( $request->password);
        $USER->remember_token = Str::random(40);
        
        if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHis') . '-' . $file->getClientOriginalName();
                $file->move(public_path('upload/bloger_images'), $filename);
                $USER->photo=$filename;
        }
        if(!$request->hasFile('photo')){
            notify()->info('the user is added without a photo');
        }
        $USER->save();
        event(new Registered($USER));


        Mail::to($request->email)->send(new RegistredMail($USER) );
        notify()->success('the user is added successfully !');
       return redirect()->back();
        
    }
    
}
