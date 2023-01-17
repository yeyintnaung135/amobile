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

            .nav-row{
                width: 95%;
            }

            .navbar-brand{
                width: 100px;
                height: 60px;
                display: flex;
                justify-content: start;
                align-items: center;
            }
            .nav-title{
                display: none;
            }

            .nav-right{
                display: flex;
            }
            .nav-right-mobile{
                display: none;
            }
            .nav-right .nav-item{
                width: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .dropdown-menu.show{
                position: absolute;
                left: -100px !important;
                top: 30px;
            }

            
            /* bootstrap 5 custom hambuger */
            
            .navbar-toggler{
                width: 30px;
                height: 15px;
                position: relative;
                transition: .5s;
                margin-right: 10px;
            }
            
            .navbar-toggler,
            .navbar-toggler:focus,
            .navbar-toggler:active,
            .navbar-toggler-icon:focus{
                outline: none !important;
                box-shadow: none !important;
                border:0 !important;
            }
            
            .navbar-toggler span{
                margin: 0;
                padding: 0;
            }
            
            .toggler-icon{
                display: block;
                position: absolute;
                height: 3px;
                width: 90%;
                background-color: #000;
                border-radius: 2px;
                opacity: 1;
                left:0;
                transform: rotate(0deg);
                transition: .25s ease-in-out;
            }
            
            .middle-bar{
                margin-top: 0px;
            
            }
            
            /* when navigation is click  */
            
            .navbar-toggler .top-bar{
                margin-top: 0;
                transform: rotate(135deg);
            }
            
            .navbar-toggler .middle-bar{
                opacity: 0;
                filter: alpha(opacity=0);
            }
            
            .navbar-toggler .bottom-bar{
                margin-top: 0px;
                transform: rotate(-135deg);
            }
            
            /* State when the navbar is collapsed */
            
            .navbar-toggler.collapsed .top-bar{
                margin-top: -20px;
                transform: rotate(0deg);
            }
            
            .navbar-toggler.collapsed .middle-bar{
                opacity: 1;
                filter: alpha(opacity=0);
            }
            
            .navbar-toggler.collapsed .bottom-bar{
                margin-top: 20px;
                transform: rotate(0deg);
            }
            
            /* bootstrap 5 Custom Hambuger End  */
            
            
        

 
            .font-weight-bolder{
                font-weight: 900;
            }

            .top{
                height: 85px;
                /* background-color: #000; */
            }

         

            .footer{
                height: 400px;
                background-color: #101d30;
                background-image: url("{{ asset('images/logos/footer-1.png')}}");
                background-position:bottom;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                /* background-repeat: repeat-x; */
                display:flex;
                justify-content: center;
               
            }
            .footer-inner{
                justify-content: center;
                /* width: 20%; */
                text-align: center;
                color:#fff;
            }

            @media screen and (max-width: 991px) {
                .nav-right{
                    display: none;
                }
                .navbar-brand{
                   height: 50px;
                }

                .nav-logo{
                    display: none ;
                }

                .nav-title{
                   display: flex;
                }

                .nav-right-mobile{
                    display: flex;
                }

                .nav-right-mobile .dropdown-menu.show{
                    position: absolute;
                    left: -121px !important;
                    top: 30px;
                }


                .nav-right-mobile .nav-item{
                    width: 30px;
                }
                .navbar-collapse .nav-item{
                    text-align: center;
                }
            }
        
            @media screen and (max-width: 564px) {

                .footer{
                    height: 250px;
                    background-color: #101d30;
                    background-image: url("{{ asset('images/logos/footer-1.png')}}");
                    background-position: bottom;
                    background-size: 100% 50%;
                    background-repeat: no-repeat;
                }
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
        // window.onscroll = function() {scrollFunction()};

        // function scrollFunction() {
        //     if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        //         document.getElementById("navbar").style.height = "100px";
        //         document.getElementById("logo").style.padding = "1px";
        //     } else {
        //         document.getElementById("navbar").style.height = "90px";
        //         document.getElementById("logo").style.padding = "5px";
    
        //     }
        // }

        function myDropFunction() {
            document.getElementById("aMobileDropdown").classList.toggle("show");
                
        }

    </script>
</html>

    