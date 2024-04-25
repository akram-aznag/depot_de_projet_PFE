<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Post;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function genrate_blogers_pdf(){
        $users=User::where('role','user')->get();
        $data =[
            'title'=>'blogers list',
            'date'=>date('Y-m-d'),
            'users'=>$users
        ];
        
        $pdf = Pdf::loadView('pdf.users_pdf', $data);
        return $pdf->download('blogers_list.pdf');
    }
    public function AdminDashboard(){
        return view('admin.index');
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
   
    public function AdminProfile(){
        $admin_id=Auth::user()->id;
        $admin_data=User::find($admin_id);
        return view('admin.admin_profile')->with('data', $admin_data);


    }
    public function Updateprofile(Request $request,string $id){
        $admin= User::where('id',$id)->get()->first();
        
        
        $request->validate([
            'name'=>'required|string|min:3|max:30',
            'username'=>'required|string|min:3|max:40|unique:users,username',
            'email'=>'required|email',
            'adress'=>'string',
            'phone'=>'numeric|regex:/^[0-9]{10}$/',

        ]);

       $updated_data= $admin->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'adress'=>$request->adress,
            'phone'=>$request->phone,
        ]);
        if($updated_data){
         
            
            notify()->success('the profile has been updated successfully !') ;

            if($request->file('photo')){
                $file=$request->file('photo');
                @unlink(public_path('upload/admin_images'.$admin->photo));
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'),$filename);
                $admin->update([
                    'photo'=>$filename
                ]);
                            
    
            }
            
            
        }
        else{
          
            notify()->error('the profile is not updated !') ;

        }
        $admin->save();
      
       return redirect()->route('admin.profile');
        
    }
    public function changepassword(){
        $admin_id=Auth::user()->id;
        $admin_data=User::find($admin_id);
        return view('admin.admin_change_password')->with('data',$admin_data);
    }
    public function updatepassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
    
        // Match the old password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            // Set a session variable to store the error message
            notify()->error('the old password is not correct') ;
        }
    
      else{

          User::where('id', Auth::user()->id)->update([
              'password' => Hash::make($request->new_password),
          ]);
          notify()->success('the password is modefied successfullyv !') ;

      }
    
        // Redirect with success message
       
        return back();
    }

    
    
}
