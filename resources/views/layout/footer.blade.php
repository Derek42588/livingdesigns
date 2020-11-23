<footer id="main-footer" class="text-center p-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Copyright &copy; <span id="year"> </span> Derek Pyle</p>
            </div>
        </div>
    </div>
</footer>
{{-- Common Scripts--}}
<script src="{{ asset('js/app.js') }}"></script>

<script>
    //get current year for copyright
    $('#year').text(new Date().getFullYear());

    //init scrollspy
    $('body').scrollspy({target: '#main-nav'})

    //smooth scrolling
    $('#main-nav a').on('click', function(e) {
        //check for a hash value
        if (this.hash !== '') {
            //prevent default
            e.preventDefault()
            //store hash in var
            const hash = this.hash
            //animate smooth scroll
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function() {
                //add hash to url after scroll
                window.location.hash = hash;
            })
        }
    })
</script>

{{--Page Specific Scripts--}}
@yield('pagespecificscripts')
