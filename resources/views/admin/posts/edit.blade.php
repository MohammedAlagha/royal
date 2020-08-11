@extends('layouts.admin.app')

@section('title','edit post')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">edit post</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['admin.posts.update',$post->id],'method'=>'put','files'=>true]) !!}

                @include('partials._errors')
                    <div class="form-group col-md-6">
                        <label for="name">title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title',$post->title)}}" placeholder="title">
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
                    <img src="{{asset("images/posts/$post->image")}}" height="200" alt="no image">
                </div>

                <div class="form-group">
                    <label for="description">details</label>
                    <textarea name="details" class="form-control" id="details" cols="30" rows="10">{{old('details',$post->details)}}</textarea>
                    @error('details')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>

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


