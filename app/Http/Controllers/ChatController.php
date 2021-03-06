<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\Events\ChatEvent;


class ChatController extends Controller
{    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat()
    {
        return view('chat');
    }

    public function send(Request $request)
    {

        $user = User::find(Auth::id());

        $this->saveToSession($request);

        event(new ChatEvent($request->message,$user));
        // return $request->all();


    }

    public function saveToSession(Request $request)
    {
        session()->put('chat', $request->chat);
    } 

    public function getOldMessage()
    {
    	return session('chat');
    }

    public function send2()
    {

        $user = User::find(Auth::id());
        event(new ChatEvent("test",$user));
                                return $request->all();


    }


}
