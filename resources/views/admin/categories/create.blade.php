@extends('layouts.admin.app')

@section('title','create Category')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create Category</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.categories.store','method'=>'post']) !!}

                @include('partials._errors')
                <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="name of category">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="hidden"  name="status" value="inactive" >
                            <input class="form-check-input" name="status" type="checkbox" value="active" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Active
                            </label>
                            @error('status')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">create</button>
                {!! Form::close() !!}
            </div>
        </div>


        </div>


@endsection
