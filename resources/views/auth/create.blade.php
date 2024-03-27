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
                                            <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('store') }}">
                                                @csrf
                                                @if(isset($post))
                                                    @method('PUT')
                                                @endif
    
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
    
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ Session::get('success') }}
                                                    </div>                                                    
                                                @endif
    
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputTitle" type="text" name="title" placeholder="Title" value="{{ isset($post) ? $post->title : '' }}" />
                                                    <label for="inputTitle">Title</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="inputContent" name="detail" rows="4" placeholder="Content">{{ isset($post) ? $post->detail : '' }}</textarea>
                                                    <label for="inputContent">Content</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="inputDescription" name="button" rows="4" placeholder="Description">{{ isset($post) ? $post->button : '' }}</textarea>
                                                    <label for="inputDescription">Description</label>
                                                </div>
                                                <div class="d-flex justify-content-center mt-4 mb-0">
                                                    <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Submit' }}</button>
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

