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

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            a{
                text-decoration: none;
                color: #000;
            }
            .swiper {
              width: 100%;
              height: 500px;
            }
            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;

                /* Center slide text vertically */
                display: -webkit-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
            }

            .swiper-slide img{
                object-fit: contain;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .swiper-pagination-bullet-active {
                background-color: #000 !important;
            }

/* Add responsiveness - on screens less than 580px wide, display the navbar vertically instead of horizontally */
@media screen and (max-width: 991px) {
    .swiper {
        width: 100%;
        height: 300px;
    }
} 



        </style>
        @stack('style')
    </head>
    <body>

        @include('frontend.layout.navbar')


        <main class="container-fluid">
           @yield('content')
        </main>
    </body>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/app.js')}}"></script>
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

    