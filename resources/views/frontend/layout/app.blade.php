<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

        <!-- app -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/fancybox.css')}}">
        <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #fff !important;
            }
            a{
                text-decoration: none;
                color: #000;
            }

            .top{
                height: 95px;
            }

            .footer{
                height: 400px;
                background-color: #101d30;
                display:flex;
                justify-content: center;
            }
            .footer-inner{
                justify-content: center;
                /* width: 20%; */
                text-align: center;
                color:#fff;
            }
        </style>
        @stack('style')
    </head>
    <body>
        <div class="top">
           @include('frontend.layout.navbar')
        </div>
        <main class="container-fluid mb-5">
           @yield('content')
        </main>

        @include('frontend.layout.footer')
    </body>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/fancybox.js')}}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js')}}"></script>
    @stack('script')
    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "25px 10px";
                document.getElementById("logo").style.padding = "1px";
            } else {
                document.getElementById("navbar").style.padding = "20px 10px";
                document.getElementById("logo").style.padding = "5px";
    
            }
        }
    </script>
   
</html>

    