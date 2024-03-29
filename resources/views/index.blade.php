@extends('layouts.frontend')

@section('content')
<section class="cta-section theme-bg-light py-5">
    <div class="container text-center">
        <h2 class="heading">DevBlog - A Blog Template Made For Developers</h2>
        <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
        <form class="signup-form form-inline justify-content-center pt-3" method="GET" action="/search">
            <div class="form-group">
                <input type="text" id="query" name="query" class="form-control mr-md-1 query" placeholder="Type keyword search">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!--//container-->
</section>
<section class="blog-list px-3 py-5 p-md-5">
    <div class="container">
        @foreach($posts as $post)
        <div class="item mb-5">
            <div class="media">
                <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
                <div class="media-body">
                    <h3 class="title mb-1"><a href="{{ route('post.single', ['slug' => $post->slug] ) }}">{{ $post->title }}</a></h3>
                    <div class="meta mb-1"><span class="date">Published {{ $post->created_at->diffForHumans() }}</span><span class="category"><a href="{{ route('category.post', ['id' => $post->category_id ]) }}">{{ $post->category->name }}</a></span></div>
                    <div class="intro">{!! substr($post->content, 0, 200) !!}</div>
                    <a class="more-link" href="{{ route('post.single', ['slug' => $post->slug] ) }}">Read more &rarr;</a>
                </div>
                <!--//media-body-->
            </div>
            <!--//media-->
        </div>
        <!--//item-->
        @endforeach

        <nav class="blog-nav nav nav-justified my-5">
            @include('includes.pagination', ['paginator' => $posts->appends(Request::except('page'))])
        </nav>

    </div>
</section>
@endsection