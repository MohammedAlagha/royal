@extends('layouts.admin.app')

@section('title','edit user')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">edit User</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['admin.users.update',$user->id],'method'=>'put','files'=>true]) !!}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name',$user->name)}}" placeholder="name">
                     @error('name')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email',$user->email)}}" placeholder="email">
                     @error('email')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" class="form-control" id="image">
                 @error('image')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                </div>

                <div class="form-group">
                    <img src="{{asset("images/users/$user->image")}}" height="200" width="200" alt="no image">
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="description">password</label>--}}
{{--                    <input type="password" name="password" class="form-control" id="password">--}}
{{--                </div>--}}

                <button type="submit" class="btn btn-primary">edit</button>
                {!! Form::close() !!}
            </div>
        </div>


    </div>


@endsection


@push('style')

    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}">
@endpush
@push('script')
    <script src="{{asset('plugins/trumbowyg/trumbowyg.min.js')}}"></script>
    <script>
        $('#description').trumbowyg();
    </script>
@endpush


