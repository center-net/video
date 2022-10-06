<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('site.include.head')
@if (App::getLocale() == 'en')
<style>
    body {
        direction: ltr;
    }
</style>
@endif

</head>

<body class="home">

    <div id="page" class="full-page">



            @include('site.include.header')



        <main id="content" class="site-main">
            @yield('content')
        </main>


        <footer id="colophon" class="site-footer footer-primary">

            @include('site.include.footer')
        </footer>


        <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!-- custom search field html -->
        <div class="header-search-form">
            <div class="container">
                <div class="header-search-container">
                    <form class="search-form" role="search" method="get">
                        <input type="text" name="s" placeholder="Enter your text...">
                    </form>
                    <a href="#" class="search-close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- header html end -->
    </div>

@yield('scripts')
</body>

</html>
