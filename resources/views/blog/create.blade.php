@extends('layout.layout')


@section('content')

    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h1><i class="fas fa-user"></i>Create Post</h1>
                </div>
            </div>
        </div>
    </header>


    {{--
    Profile
    --}}
    <section id="post-editor">
        <div class="container">
            <div class="row">
                <div class='col-md-9'>
                    <div class="card">

                        <div class="card-body">
                            <form method = "POST" action="/blog">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input
                                        name="title"
                                        id="title"
                                        type="text"
                                        class="form-control mb-2 @error('title') border-danger @enderror"
                                        value="{{old('title')}}"
                                    >

                                    @error('title')
                                    <p class="bg-danger p-2 text-white text-center" >{{$errors->first('title')}}</p>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imageLink">Image Link.  Link should look like "https://i.imgur.com/bZ4nGcN.jpg"</label>
                                    <input
                                        name="imageLink"
                                        id="imageLink"
                                        type="text"
                                        class="form-control mb-2 @error('imageLink') border-danger @enderror"
                                        value="{{old('imageLink')}}"
                                    >

                                    @error('imageLink')
                                    <p class="bg-danger p-2 text-white text-center" >{{$errors->first('imageLink')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imageAlt">Image Description.  Descriptive but not overly wordy, e.g. Lawn with brick walkway, shrub in background</label>
                                    <input
                                        name="imageAlt"
                                        id="imageAlt"
                                        type="text"
                                        class="form-control mb-2 @error('imageAlt') border-danger @enderror"
                                        value="{{old('imageAlt')}}"
                                    >

                                    @error('imageLink')
                                    <p class="bg-danger p-2 text-white text-center" >{{$errors->first('imageLink')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags - optional.  Separate by comma e.g. Landscaping, Design</label>
                                    <input
                                        name="tags"
                                        id="tags"
                                        type="text"
                                        class="form-control mb-2 @error('title') border-danger @enderror"
                                        value="{{old('tags')}}"
                                    >
                                    @error('tags')
                                    <p class="bg-danger p-2 text-white text-center" >{{ $message }}</p>
                                    @enderror
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label for="tags">Tags</label>--}}
{{--                                    <select name="tags[]" class="mb-3" multiple>--}}
{{--                                        @foreach ($tags as $tag)--}}
{{--                                            <option value="{{ $tag->id }}">{{$tag->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('tags')--}}
{{--                                    <p class="bg-danger p-2 text-white text-center" >{{ $message }}</p>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea name="body" id="body" class="form-control @error('title') border-danger @enderror">{{old('body')}}</textarea>
                                    @error('body')
                                    <p class="bg-danger p-2 text-white text-center" >{{$errors->first('body')}}</p>
                                    @enderror
                                </div>

                                <button type = "submit" class="btn-primary btn-lg btn-block">Submit</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('pagespecificscripts')
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
