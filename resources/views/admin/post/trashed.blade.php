@extends('layouts.sb-admin')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Trashed Post</h1>
<p class="mb-4">This is post page for administrator.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Trashed Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Restoring</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="90px" height="50px">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-info">Restore</a></td>
                        <td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection