@extends('layouts.front.app')

@section('title','home')

@section('content')

    <!-- product list start-->

        <section class="single_product_list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($products as $product)
                        <div class="single_product_iner">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_product_img">
                                        <img src="{{asset("images/products/$product->image")}}" class="img-fluid" alt="#">
                                        <img src="{{asset('front/img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div class="single_product_content">
                                        <h5>${{$product->price}}</h5>
                                        <h2> <a href="{{route('products.single_product',$product->id)}}">{{$product->name}}</a> </h2>
                                        <a href="{{route('products.products_list')}}" class="btn_3">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    <!-- product list end-->





    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Product::take(6)->get() as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">
                            <div class="single_product_item_thumb">
                                <img src="{{asset("images/products/$item->image")}}" alt="#" class="img-fluid">
                            </div>
                        <h3> <a href="{{route('products.single_product',$item->id)}}">{{$item->name}}</a> </h3>
                        <p>${{$item->price}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- trending item end-->

{{--    <!-- client review part here -->--}}
{{--    <section class="client_review">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="client_review_slider owl-carousel">--}}
{{--                        <div class="single_client_review">--}}
{{--                            <div class="client_img">--}}
{{--                                <img src="img/client.png" alt="#">--}}
{{--                            </div>--}}
{{--                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>--}}
{{--                            <h5>- Micky Mouse</h5>--}}
{{--                        </div>--}}
{{--                        <div class="single_client_review">--}}
{{--                            <div class="client_img">--}}
{{--                                <img src="img/client_1.png" alt="#">--}}
{{--                            </div>--}}
{{--                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>--}}
{{--                            <h5>- Micky Mouse</h5>--}}
{{--                        </div>--}}
{{--                        <div class="single_client_review">--}}
{{--                            <div class="client_img">--}}
{{--                                <img src="img/client_2.png" alt="#">--}}
{{--                            </div>--}}
{{--                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>--}}
{{--                            <h5>- Micky Mouse</h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- client review part end -->--}}
@endsection
