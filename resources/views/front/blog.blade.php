@extends('layouts.front.app')

@section('title','blog')

@section('content')

    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{asset('images/posts/'.$post->image)}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{$post->day}}</h3>
                                    <p>{{$post->month}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('blog.single_post',$post->id)}}">
                                    <h2>{{$post->title}}</h2>
                                </a>
                                <p> {!! \Illuminate\Support\Str::words($post->details, 25)  !!}</p>

                            </div>
                        </article>
                        @endforeach
                        {{$posts->links()}}
{{--                        <nav class="blog-pagination justify-content-center d-flex">--}}
{{--                            <ul class="pagination">--}}
{{--                                <li class="page-item">--}}
{{--                                    <a href="#" class="page-link" aria-label="Previous">--}}
{{--                                        <i class="ti-angle-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a href="#" class="page-link">1</a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item active">--}}
{{--                                    <a href="#" class="page-link">2</a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a href="#" class="page-link" aria-label="Next">--}}
{{--                                        <i class="ti-angle-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection
