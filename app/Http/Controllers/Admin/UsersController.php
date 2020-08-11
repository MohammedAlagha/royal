<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $users = User::get();

        return DataTables::of($users)->addColumn('action', function ($user) {

            return "<a class='btn btn-xs btn-primary edit' href='" . route('admin.users.edit', $user->id) . "' data-value='" . $user->name . "'><i class='fa fa-edit'></i></a>
                    <a class='btn btn-xs btn-danger delete' data-id='" . $user->id. "' data-url='" . route('admin.users.destroy', $user->id) . "'><i class='fa fa-trash'></i></a>";

        })->editColumn('image', function ($user) {
            return "<img src='" . asset("images/users/$user->image") . "' height='50' width='50'  alt='no image'>";
        })->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request_data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('users/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }


        User::create($request_data);

        session()->flash('success','Data Added Successfully');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, user $user)
    {
        $request_data = $request->except('image');

        if ($user->image && $user->image != 'default.png'){
            Storage::disk('images')->delete("users/$user->image");
        }


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('users/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);

        session()->flash('success','Data Added Successfully');

        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();

        if ($user->image && $user->image != 'default.png'){
            Storage::disk('images')->delete("users/$user->image");
        }

        return response()->json(['message'=>'Deleted Successfully']);

    }
}
