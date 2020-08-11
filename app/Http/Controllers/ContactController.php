<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact(){
        return view('front.contact');
    }

    public function storeMessages(Request $request){

        Message::create($request->all());

        return redirect()->back();

    }
}
