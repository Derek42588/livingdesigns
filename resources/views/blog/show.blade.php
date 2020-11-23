@extends('layout.layout')

@section('pagespecifichead')
    <title>Living Design's Blog: {{$post->title}}</title>
    <meta name = "description"
          content = @if($post->tags->first())"Blog post about: {{ implode(' | ', $post->tags->pluck('name')->all())}}" @else"A blog post about general landscaping and gardening"@endif>
@endsection


@section('content')

<section id="blog-post">
    <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center p-4">{{$post->title}}</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-6 p-4">
                            <img src={{$post->imageLink}} alt="{{$post->imageAlt}}" class="img-fluid">
                        </div>
                    </div>
                    <div class = "BlogSnippet__tag-box">

                        <div class = "BlogSnippet__tag-box__tags">
                            @if($post->tags->first())
                                <i class="fas fa-tags BlogSnippet__tag-box__icon"></i>
                            @endif
                            @foreach ($post->tags as $tag)
                                <a class = "BlogSnippet__tag-box__tag" href ="{{route('blog.index',['tag'=>$tag->name])}}" >{{$tag->name}}</a>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body blog-main-text">
                    {!! $post->body !!}
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="/blog/" class="btn btn-primary">All Posts</a>
                        <a href="https://twitter.com/share?url={{url('/blog')}}/{{$post->id}}/">
                            <i class="fab fa-twitter"></i>
                            Tweet
                        </a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/blog')}}/{{$post->id}}/&display=popup&ref=plugin&src=share_button">
                            <i class="fab fa-facebook"></i>
                            Share
                        </a>
                    </div>
                    @auth
                    <a href="/blog/{{$post->id}}/edit" class="btn btn-primary">Edit Post</a>
                    <form method = "POST" action="/blog/{{$post->id}}">
                        @csrf
                        @method('Delete')
                        <button type = "submit" class="btn-danger btn-lg">Delete</button>
                    </form>
                        @endauth
                </div>
            </div>


    </div>
</section>

@endsection
