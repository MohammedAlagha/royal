<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\SubscribeMail;
use App\NewsLetter;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class NewsLettersController extends Controller
{


    public function index()
    {
        return view('admin.newsletters.index');
    }

    public function data()
    {
        $newsletters = NewsLetter::get();

        return DataTables::of($newsletters)->addColumn('action', function ($newsletter)
            {
            return "<a class='btn btn-xs btn-danger delete' data-id='" . $newsletter->id. "' data-url='" . route('admin.newsletters.destroy', $newsletter->id) . "'><i class='fa fa-trash'></i></a>";
            })
            ->editColumn('content',function ($newsletter)
            {
                return substr($newsletter->content, '0', '20') . '....';
            })->rawColumns(['content', 'action'])
            ->make(true);
    }


    public function create()
    {
        return view('admin.newsletters.create');
    }



    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'content'=>'required|min:5'
        ]);

        NewsLetter::create($request->all());

        $subscribers = Subscribe::all();

        Mail::to($subscribers)->send(new SubscribeMail('ew','wef'));

        session()->flash('success','Newsletter sent Successfully');

        return redirect()->route('admin.newsletters.index');

    }

    public function destroy($id)
    {
        $newsLetter = NewsLetter::findOrFail($id);

        $newsLetter->delete();

        return response()->json(['message'=>'Deleted Successfully']);

    }

}
