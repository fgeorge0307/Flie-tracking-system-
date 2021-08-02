<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{

    public function login(){
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('message','Invalid Login Details.');
    }

    public function dashboard(){
        $email = Auth::user()->email;
        $data = DB::table('messages')->where('to','LIKE',$email)->paginate(5);
        
        return view('pages.mailbox')->with('data',$data);
    }

    public function sent(){
        $email = Auth::user()->email;
        $data = DB::table('messages')->where('from','LIKE',$email)->paginate(5);
        
        return view('pages.sent')->with('data',$data);
    }
    public function register(){
        return view('pages.register');
    }

    public function process_register(Request $request){
        $user = new User();
        $user->name =$request->input('name');

        $user->email =$request->input('email');
        $user->password =bcrypt($request->input('password'));
        
        $user->save();
        return redirect()->back()->with('message','Registration Successful');
    }

    public function compose(){
        return view('pages.compose');
    }

    public function sendMessage(Request $request){
        $message = new Message();
        $mls =time();
        $message->subject =$request->input('subject');

        $message->to =$request->input('to');
        $message->from =$request->input('from');
        $message->filepath= $request->file('attachment')->storeAs('public/'.$mls,$mls.'.jpg');
        $message->broadcast=0;
        $message->save();
        return redirect()->back()->with('message','Message Sent');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');

    }
}
