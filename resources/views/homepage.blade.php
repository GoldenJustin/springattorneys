@extends('welcome')

@section('content')
    {{-- 
@include('layouts.review') --}}


<div id="p_lt_ctl01_sys_pnlUpdate">
    <section class="block top-wrapper clearfix">
        @foreach ($posts as $index => $post)
        <div class="col-md-6 no-pad">
            <div class="bg-img"><img class="img-responsive" src="{{ asset('assets/image/' . $imageFiles[$index % count($imageFiles)]) }}" alt="" />

                <div class="content-inner {{ $index % 2 == 0 ? 'right' : 'left' }}">
                    <div class="board short {{ $index % 2 == 0 ? 'bg-blue' : 'bg-purple' }}">
                        <div class="title">
                            <h3>
                                <p>{{ $post->title }}</p>
                            </h3>
                        </div>
                        <div class="detail">
                            <p>{{ $post->detail }}</p>
                        </div>
                        <div class="button"><a _blank="" class="btn btn-default">{{ $post->button }}</a> </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="title-heading clearfix">
                    <h1>Spring Attorneys Offer</h1>
                </div>
                <div class="lipsum elements">
                    <h3>
                        <ul>
                            <li>Fusion of Dynamic Expertise and Characters</li>
                            <li>Destination to esteemed legal services</li>
                        </ul>
                    </h3>
                    <p>We are duty bound to serve the community, in particularly the needy community members.
                        We, at Spring Attorneys, are dedicated towards this cause, through our legal clinic
                        section. Our legal clinic provides some legal assistance and legal education to the
                        community members in different aspects. We train young people on career development and
                        counseling on how to maximize their potential in the legal fraternity. </p>
                </div>
            </div>
        </div>
    </div>
</div>


    <div style="vertical-align: top;">
        <div id="dvChoosePlan">
            <div class="boardposition">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="title">
                                <h1 class="txt-purple txt-bold"></h1>
                            </div>
                            <div class="plan-type">
                                <div class="row" data-toggle="buttons">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="click  " style="cursor:default;">
                                            <input type="radio" name="options" id="option1" value="# | Basic Plan ">
                                            <div class="thumbnail " style="height:200px">
                                                <div class="head" style="background-color:#4da86f">
                                                    <div class="head-inner">
                                                        <p style="color:#FFFFFF !important;"><i
                                                                class="fa fa-flag"></i>&nbsp;Mission
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="caption wysiwyg">
                                                    <span class="price txt-purple">Ensure client’s sustainable
                                                        undertakings through unrivaled legal services.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="click  " style="cursor:default;">
                                            <input type="radio" name="options" id="option1"
                                                value="# | WOB Vacancy Premium Plan ">
                                            <div class="thumbnail " style="height:200px">
                                                <div class="head" style="background-color:#2c3d52">
                                                    <div class="head-inner">
                                                        <p style="color:#FFFFFF !important;"><span><i
                                                                    class="fa fa-eye"></i></span>&nbsp;Our Vission
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="caption wysiwyg">
                                                    <span class="price txt-purple">Provide swift access to high
                                                        quality cost effective legal services across the
                                                        globe.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="sign-up-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sign-up-detail text-white">

                        We timely and with sheer integrity attend to our clientele’s needs and beyond. We are
                        invested in our client’s growth, development and vision. Our clients are the epicenter and
                        the engine to our dealings. We engage them with love, professionalism and excellence.</div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <div style="vertical-align: top;"></div>
    </div>
@endsection
