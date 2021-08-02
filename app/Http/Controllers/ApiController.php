<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class ApiController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name =$request->input('name');

        $user->email =$request->input('email');
        $user->password =bcrypt($request->input('password'));
        
        $user->save();

        return new UserResource($user);
    }

    public function compose(Request $request){
        $message = new Message();
        $mls =time();
        $message->subject =$request->input('subject');

        $message->to =$request->input('to');
        $message->from =$request->input('from');
        $message->filepath= $request->file('attachment')->storeAs('public/'.$mls,$mls.'.jpg');
        $message->broadcast=0;
        $message->save();
        return response()->json([
            'status'=>'Message Sent'
        ]);
    }
}
