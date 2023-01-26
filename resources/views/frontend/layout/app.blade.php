<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logos/logo.png')}}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
       
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

            a:hover{
                color:#000;
            }

            form i {
                position: absolute;
                bottom :14px;
                right: 10px;
                cursor: pointer;
            }
           
            .bg-gray{
                background-color: #f0f0f0;
            }
            .search-box{
                cursor: pointer;
            }

            .search{
                height: 200px;
                width: 100%;
                background-color: #0b1c35;
                z-index: 10000;
                position: fixed;
                display: none;
            }

            .search-bar-row{
                height: 200px;
            }

            .search-title{
                font-size: 20px;
            }

            .form-control-navbar{
                background-color: #0b1c35;
                color:#fff;
                border-bottom: 1px solid #6a737b !important;
            }

            .form-control-navbar:focus {
                color:#fff;
                background-color:  #0b1c35 !important;
                border-bottom: 1px solid #ffffff !important;
                outline: 0;
                box-shadow: 0 0 0 0 !important;
            }

            .form-control-navbar{
                width: 100%;
            }
            .input-group-append {
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-navbar{
                color: #fff;
                font-size: 15px;
            }

            .btn-navbar:hover{
                color: #fff;
            }

            .fa-times{
                font-size: 19px;
                transition: 0.5s;
            }

            .fa-times:hover{
                transform: rotate(90deg);
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

            .navbar i{
                font-size: 16px;
            }

            .badge-top{
                position: absolute;
                top: -6px;
                right: 6px;
                width: 15px;
                height: 15px;
                display: flex;
                justify-content: center;
                align-items: center;
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
            
            
            /* Product Cart  */
            .my-cart{
                border-radius: 50px;
                width: 150px;
                height: 40px;
                background-color:#0b1c35;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #ffffff;
                cursor: pointer;
           }

            .my-cart:hover{
                background-color: #ffffff;
                color: #000;
                border: 1px solid #000;
            }

 
            .font-weight-bolder{
                font-weight: 900;
            }

            .top{
                height: 75px;
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
                .top{
                   height: 65px;
                }

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
                .search{
                   height: 150px;
                }
                .search-bar-row{
                   height: 125px;
                }
                .search-title{
                  font-size: 15px;
                }
                .fa-times{
                 font-size: 18px;
                }
                .btn-navbar{
                    font-size: 15px;
                }
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
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/fancybox.js')}}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js')}}"></script>
     @stack('scripts')
     <script>
        $(".search-box").on('click',function(){
           $('.search').slideDown()
        });

        $(".fa-times").on("click",function(){
            $(".search").slideUp();
        });
     </script>
</html>

    