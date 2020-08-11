<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscribe;
use Yajra\DataTables\DataTables;

class SubscribesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscribes.index');
    }


    public function data()
    {
        $subscribes = Subscribe::get();

        return DataTables::of($subscribes)->addColumn('action', function ($subscribe) {
            return "<a class='btn btn-xs btn-danger delete' data-id='" . $subscribe->id. "' data-url='" . route('admin.subscribes.destroy', $subscribe->id) . "'><i class='fa fa-trash'></i></a>";
        })->make(true);
    }



    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();

        return response()->json(['message' => 'Deleted Successfully']);
    }




//    public function create()
//    {
//        return view('admin.messages.create');
//    }



}
