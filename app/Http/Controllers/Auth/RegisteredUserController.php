<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistredMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'email', 'max:255', 'unique:'.User::class],
            'adress'=>'string',
            'phone'=>'string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
/*
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'adress'=>$request->adress,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);
*/
    $user = new User();
    $user->name = $request->name;
    $user->email =$request->email;
    $user->adress=$request->adress;
    $user->phone=$request->phone;
    $user->password = Hash::make($request->password);
    $user->remember_token = Str::random(40);
    $user->save();
    event(new Registered($user));
    Mail::to($request->email)->send(new RegistredMail($user) );
    if(empty($user->email_verified_at)){
        notify()->success(__('CustomizedLanguage.auth_messages.email_verification_message'));
    }
    return redirect('register');
    }
}
