@extends('frontend.layout.app')

@push('style')
<style>
  a:hover {
    color: #000;
  }
  h3, h4 {
    font-weight: 600;
  }
  .sub-nav {
    background: #54e18d1f;
  }
  .sn-product-filter {
    border: 1px solid #ccc;
    margin: 18px 0;
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
  .sn-specific-product h4 {
    font-weight: 600;
    width: 80%;
  }
  .sn-specific-product-wrapper .sn-product-image {
    aspect-ratio: 4/3;
    object-fit: cover;
    border-radius: 15px;
    /* background: aliceblue; */
    margin-bottom: 15px;
  }
  .sn-specific-product-wrapper .sn-specific-product {
    width: 23.5%;
    /* border: 1px solid #ccc; */
    border-radius: 15px;
    padding: 18px;
    background: #f3f3f3;
  }
  .sn-specific-product .product-price, .product-detail-info .product-price {
    color: #54e18d;
    font-weight: 900;
    font-size: 18px;
  }
  .product-detail-info .product-price {
    font-size: 20px;
  }
  .sn-heart {
    width: 18px;
    position: absolute;
    right: 18px;
    top: 18px;
  }
  .sn-current-product-name {
    color: #16407e;
    font-weight: 600;
  }
  .productDetailSwiper {
    height: auto;
    width: 100%;
    aspect-ratio: 3/2 !important;
  }

  .productDetailSwiperthumb {
    height: 20%;
    box-sizing: border-box;
    padding: 15px 0;
  }

  .productDetailSwiperthumb .swiper-slide {
    width: 25%;
    height: 100%;
    /* opacity: 0.4; */
    border: 1px solid #c7c7c7;
    border-radius: 10px;
  }

  .productDetailSwiperthumb .swiper-slide-thumb-active {
    opacity: 1;
  }
  .productDetailSwiper img {
    background: #f3f3f3;
    border-radius: 5px;
  }
  .sn-instock {
    background: #54e18d61;
    display: block;
    padding: 7px 15px;
    border-radius: 15px;
    width: 90px;
    text-align: center;
  }

  input {
    display: none;
  }

  .color-button {
    display: inline-block;
    position: relative;
    width: 30px;
    height: 30px;
    margin: 10px 10px 10px 0;
    cursor: pointer;
    border-radius: 50%;
  }
  .color-button-active {
    border: 1px solid #000;
  }

  .color-button span {
    display: block;
    position: absolute;
    width: 23px;
    height: 23px;
    padding: 0;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 100%;
    background: #eeeeee;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
    transition: ease .3s;
  }
  .sn-quantity {
    width: 140px;
    background: #ebebeb;
    border-radius: 50px;
  }
  .sn-quantity input,.sn-quantity button {
    border: none;
    background: transparent;
    text-align: center;
  }
  .sn-quantity button {
    height: 100%;
    width: 40px;
  }
  .sn-quantity #quantity {
    border-left: 1px solid #afafaf;
    border-right: 1px solid #afafaf;
  }
  .sn-buy-buttons {
    margin: 20px 0;
  }
  .sn-buy-buttons .buy-it-now, .sn-buy-buttons .add-to-cart{
    background: #101d30;
    color: #fff;
    border: 1px solid #101d30;
    padding: 5px 10px;
    font-weight: 600;
    border-radius: 15px;
    width: 160px;
    margin-right: 15px;
  }
  .sn-buy-buttons .add-to-cart {
    background: transparent;
    color: #101d30;
  }
  .accordion-item, .accordion-item button {
    background: transparent !important;
    border: none;
    border-radius: 0;
  }
  .accordion-button:focus {
    border: 0;
    box-shadow: none;
  }
  /* Tablet */
  @media (max-width: 767px) {
    .sn-specific-product-wrapper .sn-specific-product {
      width: 48%;
      padding: 10px;
    }
  }

  /* Mobile */
  @media screen and (max-width: 480px) {
    .sn-buy-buttons .buy-it-now, .sn-buy-buttons .add-to-cart {
      border-radius: 50px;
    }
  }
</style>
@endpush

@section('content')
<section class="row justify-content-center bg-white">
  <div class="col-lg-10 col-12 px-3 px-lg-5 w-100 py-2 sub-nav">
    <div class="d-flex align-items-center align-self-center">
      <a href="#" class="text-secondary">Products </a> &nbsp; > &nbsp; <a href="#" class="text-secondary"> Mobile </a> &nbsp; > &nbsp; <span class="sn-current-product-name"> {{ $product->title }}</span>
    </div>
  </div>
  <div class="px-3 px-lg-5">
    <div class="row">
      <h3 class="d-none d-md-block my-4">{{ $product->title }}</h3>
      <div class="col-12 col-md-6 mt-4 mt-md-0">
          <div class="position-relative">
              <div class="swiper productDetailSwiper">
                  <div class="swiper-wrapper">
                @if (isset($product->getProductPhotos))
                   @foreach ($product->getProductPhotos as $p)
                    <div class="swiper-slide" data-src="{{ asset('images/products/samsung.png')}}" data-fancybox="product_detail">
                      <img src="{{ asset($p->image)}}"/>
                    </div>
                    @endforeach
                @else
                  <div class="swiper-slide" data-src="{{ asset('images/products/samsung.png')}}" data-fancybox="product_detail">
                      <img src="{{ asset('images/assets/default_product.png')}}"/>
                    </div>
                @endif
                  </div>
              </div>
              <div thumbsSlider="" class="swiper productDetailSwiperthumb">
                <div class="swiper-wrapper">
                  @if (isset($product->getProductPhotos))
                    @foreach ($product->getProductPhotos as $p)
                    <div class="swiper-slide border-0">
                      <img src="{{ asset($p->image)}}"/>
                    </div>
                     @endforeach
                  @else
                  <div class="swiper-slide border-0">
                      <img src="{{ asset('images/assets/default_product.png')}}"/>
                    </div>
                  @endif
                </div>
              </div>
  
          </div>
      </div>
      <div class="col-12 col-md-6 product-detail-info">
        <h4 class="product-title d-flex align-items-center align-self-center">{{ $product->title }} <div class="sn-instock d-block d-md-none ms-3" style="font-size: 14px;">Instock 2</div></h4>
        <div class="product-price my-2">${{ $product->price }}</div>
        @if ($product->stock == 1)
          <div class="sn-instock d-none d-md-block mb-3">Instock 2</div>
        @else
          <div class="sn-instock d-none d-md-block mb-3 bg-danger">Out Of Stock</div>
        @endif
        
      
        <div class="input-group sn-quantity">
          <span class="input-group-btn">
              <button type="button" class="quantity-left-minus"  data-type="minus" data-field="">
                <span class=""> - </span>
              </button>
          </span>
          <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="quantity-right-plus" data-type="plus" data-field="">
                  <span> + </span>
              </button>
          </span>
        </div>
        <div class="sn-buy-buttons d-flex">
          <button class="buy-it-now">Buy It Now</button>
          <button class="add-to-cart">Add to cart</button>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Description
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                 {!! $product->description !!}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Specification
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {!! $product->specification !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="my-3 py-2 my-md-4 py-md-3">
      <div class="d-flex justify-content-between align-items-center align-self-center mb-2 mb-md-3 pb-1">
        <h4 class="product-title">Recommendation Products</h4>
      </div>
      <div class="d-flex flex-wrap justify-content-between sn-specific-product-wrapper">
        @forelse ($relative_products as $r)
        <div class="sn-specific-product position-relative mb-3">
          <a href="{{ url('/product_detail/' . $r->id) }}" class="text-decoration-none">
            @if(isset($r->OnePhoto))
             <img src="{{ asset($r->OnePhoto->image)}}" alt="" class="sn-product-image w-100">
            @else
            <img src="{{ asset('images/assets/default_product.png')}}" alt="" class="sn-product-image w-100">
            @endif
          </a>
          <div class="text-center product-price">${{ $r->price }}</div>
        </div>
        @empty
          
        @endforelse
        
        <!-- <div class="sn-specific-product position-relative mb-3">
          <a href="{{ url('/product_detail/1') }}" class="text-decoration-none"><img src="{{ asset('images/products/samsung.png')}}" alt="" class="sn-product-image w-100"></a>
          <div class="text-center product-price">$2500</div>
        </div>
        <div class="sn-specific-product position-relative mb-3">
          <a href="{{ url('/product_detail/1') }}" class="text-decoration-none"><img src="{{ asset('images/products/samsung.png')}}" alt="" class="sn-product-image w-100"></a>
          <div class="text-center product-price">$2500</div>
        </div>
        <div class="sn-specific-product position-relative mb-3">
          <a href="{{ url('/product_detail/1') }}" class="text-decoration-none"><img src="{{ asset('images/products/samsung.png')}}" alt="" class="sn-product-image w-100"></a>
          <div class="text-center product-price">$2500</div>
        </div> -->
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
<script>
  window.addEventListener('load', function () {
    var swiper = new Swiper(".productDetailSwiperthumb", {
        loop: false,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: false,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".productDetailSwiper", {
        loop: false,
        spaceBetween: 10,
        thumbs: {
            swiper: swiper,
        },
    });
    var quantitiy=0;
    $('.quantity-right-plus').click(function(e){ 
      e.preventDefault();
      var quantity = parseInt($('#quantity').val());
      $('#quantity').val(quantity + 1);
    });

    $('.quantity-left-minus').click(function(e){
      e.preventDefault();
      var quantity = parseInt($('#quantity').val());
      if(quantity>1){
        $('#quantity').val(quantity - 1);
      }
    });
  })
  </script>
@endpush

