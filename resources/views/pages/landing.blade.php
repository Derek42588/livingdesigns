@extends('layout.layout')

@section('pagespecificstyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
@endsection

@section('pagespecifichead')
    <title>New Jersey Landscaping | Landscape Design | Landscape Development | Landscaping Quotes</title>
    <meta name = "description" content = "Chris is a Landscape Designer, based in northern New Jersey with over 40 years experience.  Get a quote today and start designing your dream property!">
@endsection

@section('content')
<section id="home">
    <div class="dark-overlay">
        <div class="container">
                @if(session('postMessage'))
                    <div id="flash-message" class="{{session('postMessage') ? 'alert-success' : ''}} alert p-3">
                        <strong>Success!</strong> Chris will get back to you shortly
                    </div>
                @endif
            <div class="row py-5">

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="card p-5">
                        <div class="card-header">
                            <h2 class="card-title">Landscape Design</h2>
                        </div>
                        <div class="card-body">
                            <p class="lead">
                                Chris has been working in the landscaping field for over <strong>four decades</strong>.
                                Through a combination of natural talent, unparalleled hands-on experience, and expertise, he will help you transform your canvas to the landscape of your dreams!
                                <a href="#contact"><strong>Contact</strong></a> him today!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="about" class="py-5">
        <div class="container testimonialContainer">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center mb-4">
                    <blockquote class="blockquote text-center">
                        <p class="landing-lead p-3 landing-quote">I love all aspects of landscaping -- taking what nature has given us and enhancing it, taking a blank canvas and creating something brand new, and rejuvenating and reviving a neglected or overgrown area.</p>

                    </blockquote>

                </div>
            </div>
        </div>
    </section>

<section id="blogShowcase" class="py-5">
    <div class="container blogShowcaseContainer">
        <div class="row">
            <div class="col-md-4">
                <img src={{$post->imageLink}} alt="{{$post->imageAlt}}" class="img-fluid">
            </div>
            <div class="col-md-8 d-flex align-items-center justify-content-center mb-4">
                <div class="card w-100">
                    <div class="card-header p-5">
                        <h3 class="card-title text-center">{{$post->title}}</h3>
                        <p class="text-center">{{$post->formattedDate}}</p>
                    </div>
                    <div class="card-body p-5">
                        {!! $post->blurb !!} ...

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-around">
                            <a href="/blog/{{$post->id}}" class="btn btn-primary">Read More</a>
                            <a href="https://twitter.com/share?url={{url('/blog')}}/{{$post->id}}/">
                                <i class="fab fa-twitter"></i>
                                 Tweet
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/blog')}}/{{$post->id}}/&display=popup&ref=plugin&src=share_button">
                                <i class="fab fa-facebook"></i>
                                Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gallery" class ="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-interval="false">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="{{url('images', 'Carousel-One-Image-One.jpg')}}" class="d-block w-100"  alt="Partially constructed house with torn up lawn in the foreground">

                        </div>

                        <div class="carousel-item">
                            <img src="{{url('images','Carousel-One-Image-Two.jpg')}}" class="d-block w-100"  alt="House under construction, worker digging up ground">

                        </div>
                        <div class="carousel-item">
                            <img src="{{url('images','Carousel-One-Image-Three.jpg')}}" class="d-block w-100"  alt="House with lush lawn and shrubbery">

                        </div>
                    </div>
                    <div class="carousel-caption carousel-footer">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1" ></li>
                            <li data-target="#myCarousel" data-slide-to="2" ></li>

                        </ol>
                        <h5 class="mb-5" id="myCarouselSubtitle">Before</h5>
                        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div id="myCarouselTwo" class="carousel slide" data-interval="false">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="{{url('images', 'Carousel-Two-Image-One.jpg')}}" class="d-block w-100"  alt="Torn up lawn in front of stairs, tractor in the background">

                        </div>

                        <div class="carousel-item">
                            <img src="{{url('images','Carousel-Two-Image-Two.jpg')}}" class="d-block w-100"  alt="Front yard with colorful shrubbery and brick stairway">

                        </div>
                    </div>
                    <div class="carousel-caption carousel-footer">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouselTwo" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarouselTwo" data-slide-to="1" ></li>
                        </ol>
                        <h5 class="mb-5" id="myCarouselTwoSubtitle">Before</h5>
                        <a class="carousel-control-prev" href="#myCarouselTwo" role="button"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarouselTwo" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="myCarouselThree" class="carousel slide" data-interval="false">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="{{url('images', 'Carousel-Three-Image-One.jpg')}}" class="d-block w-100"  alt="Neglected lawn in front of stairs">

                        </div>

                        <div class="carousel-item">
                            <img src="{{url('images', 'Carousel-Three-Image-Two.jpg')}}" class="d-block w-100"  alt="Walkway mid-construction through neglected lawn">

                        </div>
                        <div class="carousel-item">
                            <img src="{{url('images', 'Carousel-Three-Image-Three.jpg')}}" class="d-block w-100"  alt="Finished brick walkway leading to front stairs of house">

                        </div>
{{--                        <div class="carousel-item">--}}
{{--                            <img src="{{url('images', 'Carousel-Three-Image-Four.jpg')}}" class="d-block w-100"  alt="...">--}}

{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img src="{{url('images', 'Carousel-Three-Image-Five.jpg')}}" class="d-block w-100"  alt="...">--}}

{{--                        </div>--}}
                    </div>
                    <div class="carousel-caption carousel-footer">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouselThree" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarouselThree" data-slide-to="1" ></li>
                            <li data-target="#myCarouselThree" data-slide-to="2" ></li>

{{--                            <li data-target="#myCarouselThree" data-slide-to="3" ></li>--}}

{{--                            <li data-target="#myCarouselThree" data-slide-to="4" ></li>--}}

                        </ol>
                        <h5 class="mb-5" id="myCarouselThreeSubtitle">Before</h5>
                        <a class="carousel-control-prev" href="#myCarouselThree" role="button"  data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarouselThree" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
{{--<section id="gallery" class="py-5">--}}
{{--    <div class="container">--}}
{{--        <div class="row mb-4">--}}
{{--            <div class="col-4">--}}
{{--                <a href="{{ asset('images/Carousel-One-Image-One.jpg') }}" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <figure class="BlogSnippet__image-box">--}}
{{--                        <img--}}
{{--                            class="BlogSnippet__image-box__image"--}}
{{--                            src="{{ asset('images/Carousel-One-Image-One.jpg') }}"--}}
{{--                            alt="{{$post->imageAlt}}"--}}
{{--                        />--}}
{{--                    </figure>--}}
{{--                </a>--}}
{{--                <p class="text-center">Before</p>--}}

{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <a href="{{ asset('images/Carousel-One-Image-Two.jpg') }}" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <figure class="BlogSnippet__image-box">--}}
{{--                        <img--}}
{{--                            class="BlogSnippet__image-box__image"--}}
{{--                            src="{{ asset('images/Carousel-One-Image-Two.jpg') }}"--}}
{{--                            alt="{{$post->imageAlt}}"--}}
{{--                        />--}}
{{--                    </figure>--}}
{{--                </a>--}}
{{--                <p class="text-center">Before</p>--}}

{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <a href="{{ asset('images/Carousel-One-Image-Three.jpg') }}" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <figure class="BlogSnippet__image-box">--}}
{{--                        <img--}}
{{--                            class="BlogSnippet__image-box__image"--}}
{{--                            src="{{ asset('images/Carousel-One-Image-Three.jpg') }}"--}}
{{--                            alt="{{$post->imageAlt}}"--}}
{{--                        />--}}
{{--                    </figure>--}}
{{--                </a>--}}
{{--                <p class="text-center">After</p>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row mb-4">--}}
{{--            <div class="col-md-4">--}}
{{--                <a href="https://source.unsplash.com/random/560X560" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <img src="https://source.unsplash.com/random/560X560" alt="" class="img-fluid">--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <a href="https://source.unsplash.com/random/560X560" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <img src="https://source.unsplash.com/random/560X560" alt="" class="img-fluid">--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <a href="https://source.unsplash.com/random/560X560" data-toggle="lightbox" data-gallery="img-gallery"--}}
{{--                   data-height="560" data-width="560">--}}
{{--                    <img src="https://source.unsplash.com/random/560X560" alt="" class="img-fluid">--}}
{{--                </a>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{-- Contact Section --}}
<section id="contact" class="py-5">
    <div class="container">
        <div class="row">

            <div class="col">
                <div class="card p-4">
                    <form method="POST" action="/">
                        @csrf
                        <div class="card-body">
                            <h3 class="text-center">Message Chris for a <span class="text-italic">Free</span> Estimate!</h3>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required type="text" class="form-control"  name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea required class="form-control" name="body" id="body" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('pagespecificscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
    <script>
        setTimeout(function() {
            $('#flash-message').fadeOut('fast');
        }, 3000);

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        //init slick slider

        // $('.slider').slick({
        //     infinite: true,
        //     slideToShow: 1,
        //     slideToScroll: 1
        // })
        $('#myCarousel').on('slide.bs.carousel', function (e) {
            if (e.to === 2) {
                $('#myCarouselSubtitle').text('After')
            } else {
                $('#myCarouselSubtitle').text('Before')
            }
        })
        $('#myCarouselTwo').on('slide.bs.carousel', function (e) {
            if (e.to === 1) {
                $('#myCarouselTwoSubtitle').text('After')
            } else {
                $('#myCarouselTwoSubtitle').text('Before')
            }
        })
        $('#myCarouselThree').on('slide.bs.carousel', function (e) {
            if (e.to === 1 || e.to === 0 || e.to === 3) {
                $('#myCarouselThreeSubtitle').text('Before')
            } else {
                $('#myCarouselThreeSubtitle').text('After')
            }
        })
    </script>

@endsection
