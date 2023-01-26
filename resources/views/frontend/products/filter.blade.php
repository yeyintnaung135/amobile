@extends('frontend.layout.app')
@section('title','A-Mobile | Products')
@php
use App\Models\Favourite;
@endphp
@push('style')
<style>
  .sn-cat-phone, .sn-cat-laptop {
    padding: 5px 25px;
    margin-left: 15px;
    border: 1px solid #000;
    border-radius: 50px;
  }
  .sn-cat-phone {
    
    color: #000;
  }

  .tag-active{
    background: #000;
    color: #fff;
  }
  .sn-cat-laptop {
    background: transparent;
    color: #000;
  }
  .sub-nav {
    background: #54e18d1f;
  }
  .sn-product-filter {
    border: 1px solid #ccc;
    margin: 18px 0px;
    padding: 5px 20px;
    border-radius: 3px;
  }
  .sn-product-filter .sn-filter-label {
    color: #666;
  }
  .sn-filter-input {
    flex-grow: 1;
  }
  .sn-filter-input input {
    width: 95%;
    margin-left: 15px;
    padding: 1px 15px;
    border: none;
    border-left: 1px solid #ccc;
  }
  .product-sub-title {
    font-weight: 600;
  }
  .product-sub-title span {
    color: #101d30;
  }
  .sn-specific-product h4 {
    font-weight: 600;
    width: 80%;
  }
  .sn-specific-product-wrapper .sn-product-image {
    aspect-ratio: 3/2;
    object-fit: cover;
    border-radius: 15px;
    /* background: aliceblue; */
  }
  .sn-specific-product-wrapper .sn-specific-product {
    width: 23.5%;
    border: 1px solid #ccc;
    border-radius: 15px;
    padding: 18px;
  }
  .add-to-cart {
    background: #101d30;
    color: #fff;
    border: 1px solid #101d30;
    padding: 5px 10px;
    font-weight: 600;
    border-radius: 50px;
  }
  .add-to-cart-mobile {
    background: #101d30;
    color: #fff;
    border: 1px solid #101d30;
    padding: 5px 9px 5px 8px;
    font-weight: 600;
    border-radius: 50px;
    text-align: center;
  }
  .add-to-cart .fa-shopping-cart {
    font-size: 13px;
    margin-left: 3px;
  }
  .sn-specific-product .add-to-cart:hover {
    background: transparent;
    color: #101d30;
  }
  .sn-specific-product .product-price {
    color: #54e18d;
    font-weight: 900;
    font-size: 18px;
  }
  .sn-heart {
    width: 18px;
    position: absolute;
    right: 18px;
    top: 18px;
  }
  .dis-banner {
    background: #101d30;
    color: #fff;
    padding: 30px;
    border-radius: 10px;
    position: relative;
    padding: 70px;
  }
  .dis-banner h3 {
    width: 100%;
    margin-left: 6%;
    font-size: 26px;
    font-weight: bold;
  }
  .dis-banner .sn-phone-image {
    width: 100%;
    position: absolute;
    top: 10%;
    right: 320px;
  }
  .dis-banner .sn-phone-image img {
    width: 75px;
  }
  .dis-banner .sn-phone-brand {
    position: absolute;
    top: 43%;
    right: 50px;
  }
  .dis-banner .sn-phone-brand img{
    width: 35px;
    margin-left: 15px;
  }
  .realme {
    width: 115px !important;
  }

  .filter-dropdown{
    cursor: pointer;
  }

  .price-range-block {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
   }
  .sliderText{
      width:42%;
      margin-bottom:10px;
      /* border-bottom: 1px solid red; */
      padding: 10px 0 10px 0px;
      font-weight:bold;
  }
  .ui-slider-horizontal {
      height: .6em;
  }
  .ui-slider-horizontal {
      margin-bottom: 15px;
      width:40%;
  }
  .ui-widget-header {
      background: #3FE331;
  }
  .price-range-search {
      width:300px; 
      background-color: #f9f9f9; 
      border: 1px solid #0b1c35;
      /* min-width: 40%; */
      /* display: inline-block; */
      height: 32px;
      border-radius: 5px;
      /* float: left; */

      font-size:16px;
  }
  .price-range-field{
      width:55px; 
      /* min-width: 16%; */
      background-color:#f9f9f9; 
      border: 1px solid #6e6666; 
      color: black; 
      font-family: myFont; 
      font: normal 14px Arial, Helvetica, sans-serif; 
      border-radius: 5px; 
      height:23px; 
      padding:5px;
  }
  .search-results-block{
    position: relative;
    display: block;
    clear: both;
  }

  .filter-price-range{
    display: none;
  }
  
  /* Tablet */
  @media (max-width: 767px) {
    .sn-specific-product-wrapper .sn-specific-product {
      width: 48%;
      padding: 10px;
    }
    .sn-specific-product h4 {
      font-size: 18px;
    }
    .dis-banner {
      padding-top: 50px;
      padding-bottom: 80px;
    }
    .dis-banner h3 {
      margin-left: 3%;
    }
    .dis-banner .sn-phone-brand {
      left: 70px;
      right: auto;
      top: 58%;
    }
    .dis-banner .sn-phone-image {
      right: 75px;
    }
    .dis-banner .sn-phone-brand img {
      width: 25px;
    }
    .realme {
      width: 85px !important;
    }
    
  }

  /* Mobile */
  @media screen and (max-width: 480px) {
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
    .sn-cat-phone, .sn-cat-laptop {
      padding: 6px 16px;
      margin-left: 10px;
      font-size: 15px;
    }
    .dis-banner {
      padding: 40px 0 70px 0;
    }
    .dis-banner h3 {
      margin-left: 5%;
      font-size: 18px;
    }
    .dis-banner .sn-phone-brand {
      left: 13px;
      right: auto;
      top: 56%;
    }
    .dis-banner .sn-phone-image {
      right: 10px;
      top: 15%;
    }
    .dis-banner .sn-phone-image img {
      width: 50px;
    }
    .dis-banner .sn-phone-brand img {
      width: 18px;
      margin-left: 5px;
    }
    .realme {
      width: 65px !important;
    }
  }
</style>
@endpush

@section('content')
<section class="row justify-content-center">
  <div class="col-lg-10 col-12 px-3 px-lg-5 w-100 py-2 sub-nav">
    <div class="d-flex align-items-center align-self-center justify-content-between">
      <h5 class="mb-0">PRODUCTS</h5>
      <div>
        <a href="{{ route('products')}}" class="sn-cat-phone tag-active">Phone</a>
        <a href="{{ route('products.laptop')}}" class="sn-cat-laptop">Laptop</a>
      </div>
    </div>
  </div>
  <div class="px-3 px-lg-5">
    {{-- Filter --}}
    <div class="d-flex align-items-center align-self-center justify-content-between sn-product-filter mb-0">
      <div class="sn-filter-label"><i class="fas fa-filter me-1"></i> Filter</div>
      <div class="sn-filter-input mx-3">
        <!-- <input type="text" name="" id="" placeholder="325 Products"> -->
        <span class="text-black-50">{{ count($products )}} products</span>
      </div>
      <div class="filter-dropdown"><i class="fas fa-caret-down"></i></div>
    </div>
    <div class="filter-price-range">
        <!-- price range block  -->
         <div class="price-range-block w-100 p-0">
             <div class="w-lg-50 w-100 p-lg-2 p-0">
               <div class="sliderText">Price Range filter</div>
               <form action="{{ route('products.price.filter')}}" method="post">
                @csrf
                  <div class="d-flex justify-content-between">
                    <input type="text" name="min" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field border-0" />
                    <input type="text" name="max" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field border-0" />
                  </div>
                  <div class="p-2">
                    <div id="slider-range" class="price-filter-range w-100" name="rangeInput"></div>
                  </div>
                <div class="w-100 d-flex justify-content-center align-items-center">
                  <button class="price-range-search text-center" id="price-range-submit">Search</button>
                </div>
              </form>
             </div>

          </div>
    </div>

    {{-- New Arrivals --}}
    <div class="my-3 py-2 my-md-4 py-md-3">
      <div class="d-flex justify-content-between align-items-center align-self-center mb-2 mb-md-3 pb-1">
        <h2 class="product-sub-title">Our <span>New Arrivals</span></h2>
        <a href="#" class="text-decoration-none" style="font-weight: bold; font-size: 18px;">See All</a>
      </div>
      <!-- products loop  -->
      <div class="row px-1 newArrival">
         
         @forelse ($products as $p)
           <div class="col-6 p-0 col-xl-3 p-lg-0  card-height d-flex justify-content-center mb-3 ">
            <div class="card rounded-3">
                <div  class="card-header border-0 p-0 text-center">
                    <a href="{{ route('product_detail',$p->id)}}">
                    @if (isset($p->OnePhoto->image))
                    <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100">
                    @else
                    <img src="{{ asset('images/assets/default_product.png')}}" alt="" class="w-100">
                    @endif
                    </a>

                    @if (session('wishlist'))
                        @foreach (session('wishlist') as $key)
                          @if($p->id == $key)
                            <a href="{{ route('remove_wishlist',$p->id)}}"><i class="fas fa-heart"></i></a>
                          @else
                            <a href="{{ route('add_wishlist',$p->id)}}"><i class="far fa-heart"></i></a>
                          @endif
                        @endforeach
                    @elseif(Favourite::where('product_id',$p->id)->where('user_id',Auth::id())->first())
                        <a href="{{ route('remove_wishlist',$p->id)}}"><i class="fas fa-heart"></i></a>
                    @else
                        <a href="{{ route('add_wishlist',$p->id)}}"><i class="far fa-heart"></i></a>
                    @endif
                    
                </div>
                <div class="card-body p-2">
                    <div class="row p-lg-2">
                        <div class="col-12 mb-2">
                            <span class="product-title">{{ $p->title }}</span>
                        </div>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <span class="text-info font-weight-bolder price">$&nbsp;{{ $p->price }}</span>
                            <a href="{{ route('add.to.cart',$p->id )}}" class="my-cart">
                                <div class="d-flex  align-items-center">
                                    <span class="d-none d-xl-block p-1">Add To Cart</span> <i class="fas fa-shopping-cart"></i>
                                </div>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
           </div>
          @empty
              <div class="w-100 d-flex justify-content-center align-items-center">
                  <h1>There is no product</h1>
              </div>
          @endforelse 
      </div>
      <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{ url('/products/')}}" class="btn btn-outline-dark">
                back
            </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
 <script>


        $(".filter-dropdown").on('click',function(){
          $(".filter-price-range").slideToggle();
        });

        

      $("#min_price,#max_price").on('change', function () {

        $('#price-range-submit').show();

        var min_price_range = parseInt($("#min_price").val());

        var max_price_range = parseInt($("#max_price").val());

        if (min_price_range > max_price_range) {
          $('#max_price').val(min_price_range);
        }

        $("#slider-range").slider({
          values: [min_price_range, max_price_range]
        });

      });


      $("#min_price,#max_price").on("paste keyup", function () {            
        $('#price-range-submit').show();

        var min_price_range = parseInt($("#min_price").val());

        var max_price_range = parseInt($("#max_price").val());

        if(min_price_range == max_price_range){

          max_price_range = min_price_range + 100;

          $("#min_price").val(min_price_range);		
          $("#max_price").val(max_price_range);
        }

        $("#slider-range").slider({
          values: [min_price_range, max_price_range]
        });

      });


      $(function () {
        $("#slider-range").slider({
          range: true,
          orientation: "horizontal",
          min: 0,
          max: 10000,
          values: [0, 10000],
          step: 100,

          slide: function (event, ui) {
            if (ui.values[0] == ui.values[1]) {
              return false;
            }

            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
          }
        });

        $("#min_price").val($("#slider-range").slider("values", 0));
        $("#max_price").val($("#slider-range").slider("values", 1));

      });

      $("#slider-range,#price-range-submit").click(function () {
        
        var min_price = $('#min_price').val();
        var max_price = $('#max_price').val();
      
      });
 </script>
  
@endpush