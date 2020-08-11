<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SettingRequest;
use App\Http\Requests\Admin\SubscribeRequest;
use App\Subscribe;
use Illuminate\Http\Request;

class SubscribesController extends Controller
{
    public function store(SubscribeRequest $request)
    {

        Subscribe::create($request->all());

        session()->flash('success','Data Added Successfully');



        return redirect()->back();

//        return response()->json(['message'=>'Deleted Successfully']);

    }
}
