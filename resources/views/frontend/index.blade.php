@extends('frontend.layout.app')
@section('title','A Mobile')
@push('style')
    <style>
       .sub-title{
            height: 100px;
            display: flex;
            align-items: center;
       }

       .sub-title-inner-width{
         width: 90%;
       }

       .tab-inner-width{
         width: 15%;
       }


       /* Style the tab */
        .tab {
            overflow: hidden;
            display: flex;
        }

        /* Style the buttons inside the tab */
        .tab .tablinks {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            border: 1px solid #ccc;
            width: 100px;
            height: 20px;
            text-align: center;
        
        }

        /* Change background color of buttons on hover */
        .tab .tablinks:hover {
            border: 1px solid #6899d2;
        }

        /* Create an active/current tablink class */
        .tab .tablinks.active {
            border: 2px solid #6899d2;
        }

        /* Style the tab content */
        .tabcontent {
          border-top: none;
        }
        .tabcontent-2{
            display: none;
        }

        /* Card Section */

        .card{
            width: 90%;
            height: 350px;
        }

        .card-header{
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .card-header img{
            object-fit: cover;
            /* height: 250px; */
            height: 100%;
            width: 100%;
            transition: .8s ease-in-out;
            cursor: pointer;
        }
        .card-header img:hover{
            transform: scale(1.2);
        }

        .card-header i{
            position: absolute;
            top:20px;
            right: 22px;
            font-size: 25px;
            cursor: pointer;
        }

        /* .card-body{
            padding: 20px;
            border:1px solid red;
        } */

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

        .price{
            font-size: 20px;
        }

        .ads{
            height: 200px;
            border-radius: 10px;
            background: #000046;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #000046, #1CB5E0);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #000046, #1CB5E0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            overflow: hidden;
        }
        .ads-title-inner{
            height: inherit;
        }

        .ads-img-section{
            height: inherit;
            width: 400px;
            height:15z0px;
            background-color: #000046;
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ads-img-section .image-box{
            /* border:1px solid red; */
            width: 60%;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ads-img-section .image-box img{
            width: 200px;
            height: 100px;
        }

        .bank-info{
            display: block;
            width: 50%;
 
        }

        .bank-info-img{
            width: 80px;
        }


        @media screen and (max-width: 991px) {
            .sub-title-inner-width{
                width: 60%;
            }
            .tab-inner-width{
                width: 100%;
                /* border:1px solid red; */
            }
            .tab .tablinks {
                width: 100px;
                height: 20px;
            }

            .card{
                width: 95%;
                height: 100%;
           }

            .card-header{
                position: relative;
                height: 200px;
            }

            .card-header img{
                object-fit: cover;
                height: 250px;
                height: 100%;
                width: 100%;
            }

            .card-header i{
                position: absolute;
                top:10px;
                right: 12px;
                font-size: 15px;
                cursor: pointer;
            }

            .my-cart{
                border-radius: 50px;
                width:40px;
                height:40px;
                background-color:#0b1c35;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #ffffff;
            }

            .fa-shopping-cart{
                font-size: 15px;
            }


            .card-body h4{
                font-size: 15px;
            }

            .card-height{
                height: 300px;
            }

            .ads{
                height: 200px;
                border-radius: 10px;
                background: #000046;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #000046, #1CB5E0);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #000046, #1CB5E0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                overflow: hidden;
            }
            .ads-title-inner{
                height: inherit;
            }

            .ads-img-section{
                height: inherit;
                width: 300px;
                height:150px;
                background-color: #000046;
                border-radius: 100px;
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .ads-img-section .image-box{
                /* border:1px solid red; */
                width: 60%;
                height: 150px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .ads-img-section .image-box img{
                width: 200px;
                height: 100px;
            }

            .bank-info{
                display: block;
                width: 50%;
    
            }

            .bank-info-img{
                width: 100px;
            }
        }

        @media screen and (max-width: 547px) {
            .my-cart{
                border-radius: 50px;
                width:30px;
                height:30px;
                background-color:#0b1c35;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #ffffff;
            }

            .fa-shopping-cart{
                font-size: 12.2px;
            }
            .card-body h4{
                font-size: 12.2px;
            }

            .card-height{
                height: 200px;
            }
            .ads{
                height: 100px;
                border-radius: 10px;
                background: #000046;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #000046, #1CB5E0);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #000046, #1CB5E0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                overflow: hidden;
            }
            .ads-title-inner h1{
                font-size: 12px;
            }

            .ads-img-section{
                height: inherit;
                width: 150px;
                height:60px;
                background-color: #000046;
                border-radius: 100px;
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .ads-img-section .image-box{
                /* border:1px solid red; */
                width: 60%;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .ads-img-section .image-box img{
                width: 60px;
                height: 40px;
            }

            .bank-info{
                display: block;
                width: 100%;
    
            }

            .bank-info-img{
                width: 40px;
            }
        }


    </style>
@endpush
@section('content')
    <section class="row justify-content-center">
       <div class="col-lg-12 col-12 px-3 px-lg-5">
          @include('frontend.layout.swiper_slider.slider')
          <div class="row sub-title">
            <div class="col-12 py-lg-3 p-1">
                <div class="px-lg-1 d-flex justify-content-between align-items-lg-center ">
                   <div class="sub-title-inner-width d-block d-lg-flex justify-content-between align-items-center ">
                    <h3 class="mb-3 mb-lg-0 font-weight-bolder">Our New Arrivals</h3>
                    <div class="tab p-lg-2 tab-inner-width d-lg-flex justify-content-between mt-2"> 
                        <div class="tablinks rounded-4 active" onclick="opemTab(event, 'Phone')">Phone</div>
                        <div class="tablinks rounded-4 " onclick="opemTab(event, 'Laptop')">Laptop</div>
                    </div>
                   </div>
                   <a href="http://" class="font-weight-bolder ">See All</a>
                </div>
            </div>
          </div>
          <div class="row new-arrivals-product mb-lg-5 p-0">
            <div class="col-12 p-lg-0 p-1">
                <div id="Phone" class="tabcontent">
                   <div class="row">
                    @forelse ($new_arrival_phones as $p)
                    <div class="col-6 mb-2 col-xl-3 p-lg-0 p-2 card-height d-flex justify-content-center">
                        <div class="card rounded-3">
                            <a href="{{ route('product_detail',$p->id)}}" class="card-header border-0 p-0 text-center">
                                <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100">
                                <i class="far fa-heart"></i>
                            </a>
                            <div class="card-body p-2">
                            <div class="row p-lg-2">
                                <div class="col-lg-6 col-7">
                                    <h4>{{ $p->title }}</h4>
                                    <span class="text-info font-weight-bolder price">${{ $p->price }}</span>
                                    </div>
                                    <div class="col-lg-6 col-5 d-flex justify-content-center align-items-center">
                                    <div class="my-cart">
                                        <div class="d-flex  align-items-center">
                                          <span class="d-none d-xl-block p-1">Add To Cart</span> <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <h1>There is No Product</h1>
                        </div>
                    @endforelse
                   </div>
                </div>
                <div id="Laptop" class="tabcontent tabcontent-2">
                  <div class="row">
                    @forelse ($new_arrival_laptops as $p)
                    <div class="col-6 mb-2 col-xl-3 p-lg-0 p-2 card-height d-flex justify-content-center">
                        <div class="card rounded-3">
                            <a href="{{ route('product_detail',$p->id)}}" class="card-header border-0 p-0 ">
                                <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100">
                                <i class="far fa-heart"></i>
                            </a>
                            <div class="card-body p-2">
                            <div class="row p-lg-2">
                                <div class="col-lg-6 col-7">
                                    <h4>{{ $p->title }}</h4>
                                    <span class="text-info font-weight-bolder price">${{ $p->price }}</span>
                                    </div>
                                    <div class="col-lg-6 col-5 d-flex justify-content-center align-items-center">
                                    <div class="my-cart">
                                        <div class="d-flex  align-items-center">
                                          <span class="d-none d-xl-block p-1">Add To Cart</span> <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <h1>There is No laptop</h1>
                        </div>
                    @endforelse
                   </div>
                </div>
            </div>
          </div>
          <div class="row sub-title">
            <div class="col-12 py-lg-3 p-1 p-lg-2">
                <div class="px-lg-1 p-0 d-flex justify-content-between align-items-lg-center ">
                   <div class="sub-title-inner-width d-block d-lg-flex justify-content-between align-items-center ">
                    <h3 class="mb-3 mb-lg-0 font-weight-bolder">Grab the best deals on <span class="text-info">Smartphones</span></h3>
                   </div>
                   <a href="http://" class="font-weight-bolder">See All</a>
                </div>
            </div>
          </div>
          <div class="row smart-phone">
            <div class="col-12 p-lg-0 p-1">
                  <div class="row">
                  @forelse ($phones as $p)
                    <div class="col-6 mb-2 col-xl-3 p-lg-0 p-2 card-height d-flex justify-content-center">
                        <div class="card rounded-3">
                            <a href="{{ route('product_detail',$p->id)}}" class="card-header border-0 p-0 text-center">
                                <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100">
                                <i class="far fa-heart"></i>
                            </a>
                            <div class="card-body p-2">
                            <div class="row p-lg-2">
                                <div class="col-lg-6 col-7">
                                    <h4>{{ $p->title }}</h4>
                                    <span class="text-info font-weight-bolder price">${{$p->price}}</span>
                                    </div>
                                    <div class="col-lg-6 col-5 d-flex justify-content-center align-items-center">
                                    <div class="my-cart">
                                        <div class="d-flex  align-items-center">
                                          <span class="d-none d-xl-block p-1">Add To Cart</span> <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <h1>There is No Product</h1>
                        </div>
                    @endforelse
                   </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 p-lg-2 p-1 ">
                <div class="ads">
                    <div class="row ads-title-inner">
                         <div class="col-lg-4 col-5 d-flex justify-content-center align-items-center">
                           <h1 class="font-weight-bolder text-light">Purchase directly at <br> A-Mobile!</h1>
                         </div>
                         <div class="col-4 col-lg-6 d-flex justify-content-end align-items-center">
                         <div class="ads-img-section ">
                             <div class="image-box">
                               <img src="{{ asset('images/assets/Laptop-PNG.png')}}"  alt="laptop">
                               <img src="{{ asset('images/assets/phone.png')}}"  alt="phone">
                             </div>
                           </div>
                         </div>
                         <div class="col-2 d-flex justify-content-center align-items-center">
                         <div class="bank-info">
                               <div class=" d-flex justify-content-center">
                                 <img src="{{ asset('images/assets/kbz.png')}}" class="bank-info-img" alt="">
                               </div>
                               <div class=" d-flex justify-content-center">
                               <img src="{{ asset('images/assets/yomabank.png')}}" class="bank-info-img" alt="">
                               </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="row sub-title">
            <div class="col-12 py-lg-3 p-1 p-lg-2">
                <div class="px-1 d-flex justify-content-between align-items-lg-center ">
                   <div class="sub-title-inner-width d-block d-lg-flex justify-content-between align-items-center ">
                    <h3 class="mb-3 mb-lg-0 font-weight-bolder">Our rustable <span class="text-info">Laptops</span></h3>
                   </div>
                   <a href="http://" class="font-weight-bolder">See All</a>
                </div>
            </div>
          </div>
          <div class="row laptop">
            <div class="col-12 p-lg-0 p-1">
                  <div class="row">
                  @forelse ($laptops as $p)
                    <div class="col-6 mb-2 col-xl-3 p-lg-0 p-2 card-height d-flex justify-content-center">
                        <div class="card rounded-3">
                            <a href="{{ route('product_detail',$p->id)}}" class="card-header border-0 p-0 ">
                                <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100">
                                <i class="far fa-heart"></i>
                            </a>
                            <div class="card-body p-2">
                            <div class="row p-lg-2">
                                <div class="col-lg-6 col-7">
                                    <h4>{{ $p->title }}</h4>
                                    <span class="text-info font-weight-bolder price">${{ $p->price }}</span>
                                    </div>
                                    <div class="col-lg-6 col-5 d-flex justify-content-center align-items-center">
                                    <div class="my-cart">
                                        <div class="d-flex  align-items-center">
                                          <span class="d-none d-xl-block p-1">Add To Cart</span> <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <h1>There is No laptop</h1>
                        </div>
                    @endforelse
                 </div>
            </div>
          </div>
       </div>
    </section>
@endsection
@push('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
               el: ".swiper-pagination",
            },
            autoplay: {
              delay: 3000,
            },
         });

        function opemTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endpush