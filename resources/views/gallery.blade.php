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
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="image-container">
                    <img src="{{ asset('assets/image/janeth.png') }}" alt="" class="fluid img-thumbnail">
                    <div class="image-overlay">
                        <h5>Title 1</h5>
                        <p>Description 1</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="image-container">
                    <img src="{{ asset('assets/image/DSC_4110.jpg') }}" alt="" class="fluid img-thumbnail">
                    <div class="image-overlay">
                        <h5>Title 2</h5>
                        <p>Description 2</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="image-container">
                    <img src="{{ asset('assets/image/DSC_4136.jpg') }}" alt="" class="fluid img-thumbnail">
                    <div class="image-overlay">
                        <h5>Title 3</h5>
                        <p>Description 3</p>
                    </div>
                </div>
            </div>
            <!-- Add more image containers as needed -->
        </div>
        
        
        {{-- <div class="row">
          <div class="col-sm-6 col-md-4 mb-3">
            <img src="{{ asset ('assets/image/janeth.png') }}" alt="" class="fluid img-thumbnail">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src=" {{ asset ('assets/image/DSC_4110.jpg') }}" alt="" class="fluid img-thumbnail">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src="{{ asset ('assets/image/DSC_4136.jpg') }} " alt="" class="fluid img-thumbnail">      
          </div>
           <div class="col-sm-6 col-md-4 mb-3">
            <img src=" {{ asset ('assets/image/JJE_potrait_576x720.jpg') }}" alt="" class="fluid img-thumbnail" style="width: 45%">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src=" {{ asset ('assets/image/janeth.png') }}" alt="" class="fluid img-thumbnail">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src="{{ asset ('assets/image/janeth.png') }} " alt="" class="fluid img-thumbnail">      
          </div>
           <div class="col-sm-6 col-md-4 mb-3">
            <img src="{{ asset ('assets/image/janeth.png') }} " alt="" class="fluid img-thumbnail">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src=" {{ asset ('assets/image/janeth.png') }}" alt="" class="fluid img-thumbnail">      
          </div>
          <div class="col-sm-6 col-md-4 mb-3">
            <img src=" {{ asset ('assets/image/janeth.png') }}" alt="" class="fluid img-thumbnail">      
          </div>
        </div> --}}
      </div>
</div>
    
</div>

@endsection