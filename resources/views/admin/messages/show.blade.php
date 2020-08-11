@extends('layouts.admin.app')

@section('title',"message/$message->id")

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Show Message</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">show message</h6>
            </div>
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$message->name}}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$message->email}}"  readonly>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="subject">subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" value="{{$message->subject}}"  readonly>
                </div>


                <div class="form-group">
                    <label for="description">Content</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="10" readonly>{!!$message->content !!}</textarea>
                </div>

            </div>
        </div>


    </div>



@endsection
