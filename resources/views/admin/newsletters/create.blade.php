@extends('layouts.admin.app')

@section('title','add newsletter')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Newsletter</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">add newsletter</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.newsletters.store','method'=>'post']) !!}

                @include('partials._errors')
                <div class="form-group col-md-6">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="title">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="details">content</label>
                    <textarea name="content" class="form-control" id="newsletter-content" cols="30" rows="10">{{old('content')}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
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
        $('#newsletter-content').trumbowyg();
    </script>
@endpush


