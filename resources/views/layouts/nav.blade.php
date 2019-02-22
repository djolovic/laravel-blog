<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="http://blog.test/">Home</a>

            @if (Auth::check())
            <a class="blog-nav-item" href="http://blog.test/posts/create">New post</a>
                @else (redirect(/login))

            @endif

            @if (Auth::check())
            <a class="blog-nav-item" href="http://blog.test/login" style="display: none">Login</a>
                @else
                <a class="blog-nav-item" href="http://blog.test/login" >Login</a>
            @endif

            @if (Auth::check())
            <a class="blog-nav-item" href="http://blog.test/register" style="display: none">Register</a>
                @else
                <a class="blog-nav-item" href="http://blog.test/register">Register</a>
            @endif

            @if (Auth::check())
            <a class="blog-nav-item" href="http://blog.test/logout" >Logout</a>
                @else
                <a class="blog-nav-item" href="http://blog.test/logout" style="display: none">Logout</a>
            @endif

            @if (Auth::check())

            <a class="nav-item ml-auto" href="#">{{ Auth::user()->name }}</a>

                @endif
        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The LARAVEL Blog</h1>
        <p class="lead blog-description">An example blog built with Laravel 5.6</p>
    </div>
</div>