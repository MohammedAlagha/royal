@extends('layouts.front.app')

@section('title','product_list')



@section('content')

    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <form action="{{route('product.search')}}" id="form-search" method="post">
                            <div class="single_sedebar">
                                @csrf
                                <input type="text" id="search-input" name="search" value="{{old('search')}}"
                                       placeholder="Search keyword">
                                {{--<i id='search' class="ti-search"></i>--}}


                            </div>
                        </form>

                        <form action="{{route('products.products_list')}}" id="form-search2">
                            <div class="single_sedebar">
                                <div class="select_option">
                                    <div class="select_option_list">Category <i class="right fas fa-caret-down"></i>
                                    </div>
                                    <div class="select_option_dropdown">
                                        @foreach($categories as $category)
                                            <p><a id="category_{{$category->id}}" class="category-option"
                                                  data-category_id="{{$category->id}}">{{$category->name}}</a></p>

                                            @push('script')
                                                <script>
                                                    $('#category_' +{{$category->id}}).click(function (e) {
                                                        e.preventDefault()
                                                        let category_id = $(this).data('category_id');
                                                        axios({
                                                            method: 'get',
                                                            url: $('#form-search2').attr('action') + '/' + category_id,
                                                            data: {category: category_id}
                                                        }).then(function (response) {
                                                            $('#products').empty();
                                                            let data = response.data
                                                            for (let i = 0; i <= data.length; i++) {
                                                                $('#products').append(
                                                                    `<div class="col-lg-6 col-sm-6">
                                                                        <div class="single_product_item">
                                                                           <img src="{{asset("images/products")}}/${data[i].image}" alt="#" class="img-fluid">
                                                                           <h3><a href="${data[i].details_route}">${data[i].name}></a></h3>
                                                                           <p>${data[i].price}</p>
                                                                        </div>
                                                                        </div>`)
                                                            }
                                                        }).catch(function (error) {
                                                            console.log(error)
                                                        })
                                                    })
                                                </script>
                                            @endpush

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row" id="products">
                            @foreach($products as $product)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="{{asset("images/products/$product->image")}}" alt="#"
                                             class="img-fluid">
                                        <h3>
                                            <a href="{{route('products.single_product',$product->id)}}">{{$product->name}}
                                                ></a></h3>
                                        <p>{{$product->price}} $</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="load_more_btn text-center">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->


@endsection

@push('script')

    {{--    <script>--}}
    {{--        $('#search').click(function () {--}}
    {{--            $('#form-search').submit();--}}
    {{--        })--}}
    {{--    </script>--}}

    <script>
        $('#search-input').keyup(function () {
            console.log('sa');
            let that = $(this);
            axios({
                url: $('#form-search').attr('action'),
                method: $('#form-search').attr('method'),
                data: {search: that.val()}
            }).then(function (response) {
                console.log(response.data)
                $('#products').empty();
                let data = response.data
                for (let i = 0; i <= data.length; i++) {
                    $('#products').append(
                        `<div class="col-lg-6 col-sm-6">
                       <div class="single_product_item">
                        <img src="{{asset("images/products")}}/${data[i].image}" alt="#" class="img-fluid">
                        <h3><a href="${data[i].details_route}">${data[i].name}></a></h3>
                         <p>${data[i].price}</p>
                          </div>
                          </div>`)
                }
            })

        });

        if($('#search-input').val() == ''){
            axios({
                url: $('#form-search').attr('action'),
                method: $('#form-search').attr('method'),
                data: {search:""}
            }).then(function ({data}) {
                $('#products').empty();
                for (let i = 0; i <= data.length; i++) {
                    $('#products').append(
                        `<div class="col-lg-6 col-sm-6">
                       <div class="single_product_item">
                        <img src="{{asset("images/products")}}/${data[i].image}" alt="#" class="img-fluid">
                        <h3><a href="${data[i].details_route}">${data[i].name}></a></h3>
                         <p>${data[i].price}</p>
                          </div>
                          </div>`)
                }
            })
        }

    </script>

@endpush

@push('style')

    <style>
        .category-option{
            cursor: pointer;
        }
    </style>

@endpush
