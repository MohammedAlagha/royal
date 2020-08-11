@extends('layouts.admin.app')

@section('title','settings')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Settings</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">settings</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.settings','method'=>'put','files'=>true]) !!}

                <div class="form-group col-md-6">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name',\App\Setting::getValue('name'))}}" >
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="mobile">mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" value="{{old('mobile',\App\Setting::getValue('mobile'))}}" >
                        @error('mobile')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email',\App\Setting::getValue('email'))}}" >
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" value="{{old('latitude',\App\Setting::getValue('latitude'))}}" >
                        @error('latitude')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" value="{{old('longitude',\App\Setting::getValue('longitude'))}}" >
                        @error('longitude')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                    <div class="form-group col-md-6">
                        <label for="logo">logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" >
                        @error('logo')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="form-group">
                    <img src="{{asset('storage/' . \App\Setting::getValue('logo'))}}"  height="200" width="200" alt="no image">

                </div>


                    <div class="form-group col-md-6">
                        <label for="video">video</label>
                        <input type="file" name="video" class="form-control" id="video">
                        @error('video')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <video src="{{asset('storage/'. \App\Setting::getValue('video'))}}" autoplay controls></video>
                    </div>

                <div class="form-group col-md-6">
                    <label for="our_mission">Our Mission</label>
                    <textarea name="our_mission" id="our_mission" class="form-control" cols="30" rows="10">{{old('our_mission',\App\Setting::getValue('our_mission'))}}</textarea>
                    @error('our_mission')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="main_about">Main About</label>
                    <textarea name="main_about" id="main_about" class="form-control" cols="30" rows="10">{{old('main_about',\App\Setting::getValue('main_about'))}}</textarea>
                    @error('main_about')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="minor_about">Minor About</label>
                    <textarea name="minor_about" id="minor_about" class="form-control" cols="30" rows="10">{{old('minor_about',\App\Setting::getValue('minor_about'))}}</textarea>
                    @error('minor_about')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Edit</button>
                {!! Form::close() !!}
            </div>
        </div>


    </div>


@endsection
