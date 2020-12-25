@extends('layouts.sb-admin')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Post</h1>
<p class="mb-4">This is post page for administrator.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                    <option value="">Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="featured">Image</label>
                <input type="file" name="featured" class="form-control" >
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection