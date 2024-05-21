@extends('welcome')
@section('title', 'Gallery - Springattorneys')
@section('content')

    <div class="container">
        <div class="container">
            <br>
            <div class="jumbotron">
                <h2>Our Gallery</h2>
                <p>In different events we join a collection of images. welcome to see and discover more about us</p>
            </div>


            <div class="row">

              @foreach ($images as $image)
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="image-container">
                            <img src="{{ asset($image->filename) }}" alt="" class="img-fluid img-thumbnail">
                            <div class="image-overlay">
                                <h5>{{ $image->title }}</h5>
                                <p>{{ $image->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </div>


           
        </div>
    </div>

    </div>

@endsection
