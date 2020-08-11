@extends('layouts.admin.app')

@section('title','add user')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">add User</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.users.store','method'=>'post','files'=>true]) !!}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="name">
                       @error('name')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="email">
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
                    <label for="description">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                </div>

                <button type="submit" class="btn btn-primary">add</button>
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


