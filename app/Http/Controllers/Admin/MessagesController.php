<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Message;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MessagesController extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }

    public function data()
    {
        $messages = Message::get();

        return DataTables::of($messages)->addColumn('action', function ($message) {

            return " <a class='btn btn-xs btn-success show' href='" . route('admin.messages.show', $message->id) . "' data-value='" . $message->name . "'><i class='fa fa-eye'></i></a>
                    <a class='btn btn-xs btn-danger delete' data-id='" . $message->id. "' data-url='" . route('admin.messages.destroy', $message->id) . "'><i class='fa fa-trash'></i></a>";

        })->editColumn('content', function ($message) {
            return substr($message->content, '0', '20') . '....';
        })->make(true);
    }


    public function show(Message $message){

        $message->update(['readable'=>'yes']);

        return view('admin.messages.show',compact('message'));

    }


    public function destroy(Message $message)
    {

        $message->delete();


        return response()->json(['message'=>'Deleted Successfully']);

    }
}
