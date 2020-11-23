@extends('layout.layout')

@section('pagespecifichead')
    <title>Landscaping Blog | Gardening Thoughts | Landscape Design | Landscape Development</title>
    <meta name = "description"
          content = "Chris Pyle from Living Design Inc.'s official blog with thoughts on landscaping, gardening, and general botany.">
@endsection

@section('content')
{{--<main>--}}
<section id = "blog-index" class="Blog">
    @if($posts->fromTag === 'true')
        <h3 class="Blog__title">Posts Tagged: {{$posts->tag}}</h3>
    @endif

    @forelse($posts as $post)

    <div class="BlogSnippet">
        <figure class="BlogSnippet__image-box">
            <img
                class="BlogSnippet__image-box__image"
                src="{{$post->imageLink}}"
                alt="{{$post->imageAlt}}"
            />
        </figure>

        <h2 class="BlogSnippet__title">
                {{$post->title}}
            </h2>

        <h4 class="BlogSnippet__date italics">{{$post->formattedDate}}</h4>

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
        <div class="BlogSnippet__blurb">
            {!! $post->blurb !!} ...
        </div>
        <div class="BlogSnippet__button-box">
            <a href="/blog/{{$post->id}}" class="btn btn-primary">Read More</a>

        </div>
    </div>

            @empty
                <h2 class="text-center my-4">No Relevant Articles Yet</h2>
            @endforelse
            </section>
        </div>
        @if($posts->fromTag === 'false')
        <div class="container mt-3">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}

            </div>

        </div>
        @else
            <div class="container mt-3">
                <div class="d-flex justify-content-center">
                    <a href="/blog/" class="btn btn-primary">All Posts</a>

                </div>

            </div>
        @endif
</section>
{{--</main>--}}
{{--<div id="allBlogPosts">--}}
{{--    <div class="container mt-4 p-2">--}}
{{--        <div class="row">--}}
{{--        @forelse($posts as $post)--}}


{{--        <div class="col-md-6 card">--}}
{{--                <div class="card-header">--}}
{{--                    <h2 class="card-title text-center">{{$post->title}}</h2>--}}
{{--                    <div class="img-wrapper">--}}
{{--                        <img--}}
{{--                            src="{{$post->imageLink}}"--}}
{{--                            alt=""--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="card-body">--}}
{{--                    {!! $post->blurb !!} ...--}}
{{--                </div>--}}
{{--            <div class="card-footer">--}}
{{--                <a href="/blog/{{$post->id}}" class="btn btn-primary">Read More</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @empty--}}
{{--            <h2 class="text-center my-4">No Relevant Articles Yet</h2>--}}
{{--        @endforelse--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if($posts->fromTag === 'false')--}}
{{--    <div class="container mt-3">--}}
{{--        <div class="d-flex justify-content-center">--}}
{{--            {{ $posts->links() }}--}}

{{--        </div>--}}

{{--    </div>--}}
{{--    @endif--}}
{{--</div>--}}

@endsection
