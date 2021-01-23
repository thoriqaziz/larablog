@extends('layouts.sb-admin')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tag</h1>
<p class="mb-4">This is tag page for administrator.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Tag</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('tag.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" placeholder="tag name">
                @error('tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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