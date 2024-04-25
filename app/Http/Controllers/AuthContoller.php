<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Mail\ForgetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

;
use Illuminate\Support\Str;

use function Symfony\Component\String\b;

class AuthContoller extends Controller
{
    public function verifyemail(string $token)
    {
        $getuser = User::where('remember_token', $token)->first();
    
        if ($getuser) {
            // Debugging statements
    
            $getuser->email_verified_at = now();
            $getuser->save();
    
            return redirect('login');
        } else {
            return "user token is not found";
        }
    }

    public function forgerpassword()
    {
       return view('auth.forgot-password');
    }
    public function resetpasswordlink(Request $request)
    {
     $user=  User::where('email',$request->email)->first();
     if(! empty($user)){
        $user->remember_token=Str::random(40);
        $user->save();
        Mail::to($user->email)->send(new ForgetPasswordEmail($user));
        return redirect()->back()->with('success',  __('CustomizedLanguage.auth_messages.reset_password_email_message'));


     }
     else{
        return redirect()->back()->with('danger', 'the email is not exist');
     }
    }
    public function modifypassword(string $token){
        $token=User::where('remember_token',$token)->first();
        
        if(!empty($token)){

            return view('auth.reset-password',['data'=>$token]);
        }
        else{
            abort(404);
        }
    }
    public function updatepassword(Request $request,string $token){
        $USER=User::where('remember_token',$token)->first();
        
        if(!empty($USER)){
           if($request->new_password==$request->new_password_confirmation){
            $USER->password=Hash::make( $request->new_password);
            if($USER->email_verified_at==null){
                $USER->email_verified_at=now();

            }
            $USER->remember_token=Str::random(40);
            $USER->save();
            return redirect('login')->with('success','password is changed succesfully');

           }
           else{
        return redirect()->back()->with('error', 'the password and password confirmation are not matched');

           }
        }
        else{
            abort(404);
        }
    }
    public function bloger_logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}    
