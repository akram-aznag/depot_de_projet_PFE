<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class BlogerController extends Controller
{
    public function guestpage(){
        return view('content.sections');

    }
    public function bloger_dashboard(){
        return view('dashboard');
    }
    public function edit_bloger_profile(){
        $current_user_id=Auth::user()->id;
        $user=User::where('id',$current_user_id)->first();
        return view('bloger.editprofile')->with('user_data',$user);
    }
    public function update_bloger_profile(Request $request,$id){
        $request->validate([
            'name'=>'required|string|min:3|max:30',
            'username'=>'string|min:3|max:40',
            'adress'=>'string',
            'phone'=>'numeric|regex:/^[0-9]{10}$/',
        ]);
        $user=User::where('id',$id)->first();
        $result= $user->update([
            'name'=>$request->name,
            'username'=>$request->username,
           
            'adress'=>$request->adress,
            'phone'=>$request->phone,

        ]);
        $user->save();
        if($result){

            if($request->hasFile('photo')){
                $file=$request->file('photo');
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/bloger_images'),$filename);
                $user->update([
                    'photo'=>$filename
                ]);
    
            }
            return redirect()->back()->with('success','the data has been updated successfully');
        }
    
        else{
            return redirect()->back()->with('error','the data is not updated try again');

        }
    }
    public function change_bloger_password(){
        return view('bloger.changerpassword');
    }
    public function reset_bloger_password(Request $request,$id){
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required','confirmed',Rules\Password::defaults()],
        ]);
        $user=User::where('id',$id)->first();
        if(! Hash::check($request->old_password,$user->password)){
            redirect()->back()->with('error','the old password is not correct');
        }
        else{
            $user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            $user->save();
            redirect()->back()->with('success','the password is changed successfully');
        }
        return redirect()->back();

       
    }
    
}
