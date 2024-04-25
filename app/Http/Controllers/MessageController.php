<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function manage_messages(){
        $messages=Message::get();
        return view('admin.messages.show_messages')->with('messages',$messages);
    }
    public function create_message(){
        return view('content.contact_us');
    }
    public function save_message(Request $request){
        $request->validate([
            'email'=>'required|email|unique:messages,email',
            'message'=>'required|string|min:20|max:250',
        ]);
        $message=new Message();
        $message->email=$request->email;
        $message->message_content=$request->message;
        $message->save();
        if($message->save()){
            return redirect()->back()->with('success',__('CustomizedLanguage.contact_messages.succees_message'));
        }
        else{
            return redirect()->back()->with('error',__('CustomizedLanguage.contact_messages.error_message'));

        }
    }
    public function delete_message(string $message_id){
        $deleted_message=Message::where('id',$message_id)->first();
        $deleted_message-> delete();
        if($deleted_message){
             notify()->warning('the message '.$deleted_message->message_content.' is deleted');
        }
        else{
             notify()->warning('the message '.$deleted_message->message_content.' is not  deleted');

        }
        return redirect()->back();
    }
}
