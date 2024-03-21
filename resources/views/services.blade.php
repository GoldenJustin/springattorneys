@extends('welcome')
@section('title', 'Services - Springattorneys')
@section('content')
<div class="container">
    <div class="text-center">
        <img src="{{ asset ('assets/image/new-logo-black.png') }}" alt="Board Advisory Icon" style="max-width: 20%; border-radius: 10%;">

    </div>
    <h1 class="text-center">Services We Offer</h1>
    <hr>


    <div style="font-size: 25px; text-align: center; line-height: 1.6;">
    <p>Welcome to Spring Attorneys – your premier destination for top-notch legal services. We specialize in providing tailored legal advisory and governance services to individuals, organizations, and enterprises in Tanzania and East Africa. Our approach is characterized by speed, practicality, and innovation. Discover excellence in every legal endeavor with Spring Attorneys.</p>
</div>

    <br>

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 1" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Board Advisory</h1>
                            <p>Explanation Board advisory goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 2" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Labour Law & Industrial</h1>
                            <p>Explanation about Labour Law & Industrial goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 3" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Litigation and Arbitration</h1>
                            <p>Explanation about Litigation and Arbitration goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 3" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Corporate Governance</h1>
                            <p>Explanation about Corporate Governance goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 3" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Legal & Governance Audit</h1>
                            <p>Explanation about Legal & Governance Audit goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset ('assets/image/board-advisory.jpg') }}" alt="Slide 3" class="d-block w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="carousel-caption text-black">
                            <h1 class="display-2">Tax Advisory</h1>
                            <p>Explanation about Tax Advisory goes here.</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>

      
    </div>

</div>
<br>





@endsection