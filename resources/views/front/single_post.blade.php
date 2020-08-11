@extends('layouts.front.app')

@section('title',$post->title)

@section('content')

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{asset("images/posts/$post->image")}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{!! $post->title !!}
                            </h2>

                          <p>{!! $post->details !!}</p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area end =================-->


@endsection
