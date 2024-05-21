@extends('auth/index')
@section('content')
@include('auth/topnav')

<div id="layoutSidenav">
    @include('auth/sidenav')
    <div id="layoutSidenav_content">
        <main>
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">Post Content</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <label for="filename">Choose Image:</label><br>
                                                <input type="file" id="filename" name="filename" accept="filename/*" required><br>
                                                <small>Allowed file types: jpg, jpeg, png, gif. Maximum size: 2MB</small><br><br>
                                                <button type="submit">Upload Image</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div id="layoutAuthentication_footer">
                   @include('auth/footer')
                </div>
            </div>
        </main>
    </div>
    
</div>
@endsection

