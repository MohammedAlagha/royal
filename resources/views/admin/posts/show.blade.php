@extends('layouts.admin.app')

@section('title','show post')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Show Post</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">show post</h6>
            </div>
            <div class="card-body">

                    <div class="form-group col-md-6">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" readonly>
                    </div>


                <div class="form-group">
                    <label for="image">image</label>
                    <img src="{{asset("images/posts/$post->image")}}" height="200" alt="no image">
                </div>

                <div class="form-group">
                    <label for="description">details</label>
                    <textarea name="details" class="form-control" id="details" cols="30" rows="10" readonly>{!!$post->details !!}</textarea>
                </div>

            </div>
        </div>


    </div>


@endsection



