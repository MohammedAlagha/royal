@extends('layouts.admin.app')

@section('title','add post')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Post</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">add post</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.posts.store','method'=>'post','files'=>true]) !!}

                @include('partials._errors')
                    <div class="form-group col-md-6">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="title">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="details">details</label>
                        <textarea name="details" class="form-control" id="details" cols="30" rows="10">{{old('details')}}</textarea>
                        @error('details')
                        <p class="text-danger">{{$message}}</p>
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
        $('#details').trumbowyg();
    </script>
@endpush


