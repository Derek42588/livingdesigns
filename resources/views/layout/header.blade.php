
<nav class="navbar navbar-expand-md navbar-dark myNav fixed-top" id="main-nav">
    <a href="/" class="navbar-brand">LDinc.</a>
    <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item {{Request::is('blog') ? 'active' : ''}}">
                <a href="{{route('blog.index')}}" class="nav-link">Blog</a>
            </li>
            <li class="nav-item {{Request::is('/') ? '' : 'd-none'}}">
                <a href="#about" class="nav-link">About</a>
            </li>
            <li class="nav-item {{Request::is('/') ? '' : 'd-none'}}">
                <a href="#gallery" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item {{Request::is('/') ? '' : 'd-none'}}">
                <a href="#contact" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>
