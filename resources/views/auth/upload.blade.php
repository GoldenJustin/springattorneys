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
                                            <h3 class="text-center font-weight-light my-4">Upload Image</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="filename">Choose Image:</label>
                                                    <input type="file" id="filename" name="filename" accept="image/*" class="form-control" required>
                                                    <small class="form-text text-muted">Allowed file types: jpg, jpeg, png, gif. Maximum size: 2MB</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title:</label>
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description:</label>
                                                    <textarea id="description" name="description" class="form-control" placeholder="Enter description" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Upload Image</button>
                                                </div>
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

