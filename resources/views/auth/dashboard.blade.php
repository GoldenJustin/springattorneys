@extends('auth/index')
@section('content')
@include('auth/topnav')

<div id="layoutSidenav">
    @include('auth/sidenav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">This page allows you to upload your contents and Image Gallery</li>
                </ol>
                <div class="row">
                   
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Posts Table
                    </div>
                    <div class="card-body">
                        <table id="postsTable" class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->detail }}</td>
                                    <td>{{ $post->button }}</td>
                                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> <!-- Font Awesome Edit Icon -->
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> <!-- Font Awesome Trash Icon -->
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </main>
        @include('auth/footer')
    </div>
</div>
@endsection