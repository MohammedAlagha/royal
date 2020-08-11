@extends('layouts.admin.app')

@section('title','show product')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Show Product</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">show product</h6>
            </div>
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="price" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">category</label>
                    <select class="form-control form-control-lg" id="categor" name="category_id" disabled>
                        @foreach(App\Category::where('status','active')->get() as $category)
                            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="image">image</label>--}}
{{--                    <input type="file" name="image" class="form-control" id="image">--}}
{{--                </div>--}}

                <div class="form-group">
                    <label for="image">image</label>
                    <img src="{{asset("images/products/$product->image")}}" height="200" alt="no image">
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" readonly>{!!$product->description !!}</textarea>
                </div>

            </div>
        </div>


    </div>


@endsection



