@extends('layouts.admin.app')

@section('title','edit product')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">edit product</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['admin.products.update',$product->id],'method'=>'put','files'=>true]) !!}

                @include('partials._errors')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name',$product->name)}}" placeholder="name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{old('price',$product->price)}}" placeholder="price">
                   @error('price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">category</label>
                    <select class="form-control form-control-lg" id="categor" name="category_id">
                        @foreach(App\Category::where('status','active')->get() as $category)
                            <option value="{{$category->id}}" @if($category->id == old($category->id,$product->category_id)) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                     @error('category_id')
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
                    <img src="{{asset("images/products/$product->image")}}" height="200" alt="no image">
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description',$product->description)}}</textarea>
                        @error('description')
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


