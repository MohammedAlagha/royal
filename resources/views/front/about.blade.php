@extends('layouts.front.app')

@section('title','about us')

@section('content')
    <!-- product list part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_content">
                        <h5>Our Mission</h5>
                        <h3>{{\App\Setting::getValue('our_mission')}}</h3>
                        <div class="about_us_video">
{{--                            <img src="img/about_us_video.png" alt="#" class="img-fluid">--}}
                            <video width="750" height="455" src="{{asset('storage/'. \App\Setting::getValue('video'))}}" autoplay controls></video>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>{{\App\Setting::getValue('main_about')}}</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>{{\App\Setting::getValue('minor_about')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

@endsection
