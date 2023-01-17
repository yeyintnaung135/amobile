@extends('frontend.layout.app')
@section('title','A-Mobile | Products')
@push('style')
<style>
  a:hover {
    color: #000;
  }
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
  .product-title {
    font-weight: 600;
  }
  .product-title span {
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
    <div class="d-flex align-items-center align-self-center justify-content-between sn-product-filter">
      <div class="sn-filter-label"><i class="fas fa-filter me-1"></i> Filter</div>
      <div class="sn-filter-input"><input type="text" name="" id="" placeholder="325 Products"></div>
      <div class="">All</div>
    </div>

    {{-- New Arrivals --}}
    <div class="my-3 py-2 my-md-4 py-md-3">
      <div class="d-flex justify-content-between align-items-center align-self-center mb-2 mb-md-3 pb-1">
        <h2 class="product-title">Our <span>New Arrivals</span></h2>
        <a href="#" class="text-decoration-none" style="font-weight: bold; font-size: 18px;">See All</a>
      </div>
      <div class="d-flex flex-wrap justify-content-between sn-specific-product-wrapper">
        @forelse ($products as $p)
        <div class="sn-specific-product position-relative mb-3">
          <img src="{{ asset('images/icons/heart.png')}}" alt="" class="sn-heart">
          <a href="{{ url('/product_detail/' .$p->id) }}" class="text-decoration-none"><img src="{{ asset($p->OnePhoto->image)}}" alt="" class="sn-product-image w-100"></a>
          <a href="{{ url('/product_detail/' . $p->id) }}" class="text-decoration-none"><h4 class="mt-2 mb-1 mt-md-4 mb-md-2">{{ $p->title }}</h4></a>
          <div class="d-flex justify-content-between align-items-center align-self-center mb-2">
            <div class="product-price">${{ $p->price }}</div>
            <button class="add-to-cart d-none d-md-block"><span class="">Add to cart</span> <i class="fas fa-shopping-cart"></i></button>
            <button class="add-to-cart-mobile d-block d-md-none"><span class=""><i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
        @empty
           <span>There is no product</span>
        @endforelse
      </div>
    </div>

    <div class="my-3 dis-banner">
      <div class="">
        <h3 class="mb-0">UP to 10% OFF</h3>
        <div class="d-flex justify-content-end align-items-end align-self-end sn-phone-image">
          <img src="{{ asset('images/banner/image1.png')}}" alt="" class="">
          <img src="{{ asset('images/banner/image 2.png')}}" alt="" class="">
          <img src="{{ asset('images/banner/image 3.png')}}" alt="" class="">
        </div>
        <div class="d-flex justify-content-end align-items-end align-self-end sn-phone-brand">
          <img src="{{ asset('images/banner/apple.png')}}" alt="" class="">
          <img src="{{ asset('images/banner/realme.png')}}" alt="" class="realme">
          <img src="{{ asset('images/banner/Mi.png')}}" alt="" class="">
        </div>
      </div>
    </div>

    {{-- Popular --}}
    <div class="my-3 py-2 my-md-4 py-md-3">
      <div class="d-flex justify-content-between align-items-center align-self-center mb-2 mb-md-3 pb-1">
        <h2 class="product-title">Grab Our <span>Popular Products</span></h2>
        <a href="#" class="text-decoration-none" style="font-weight: bold; font-size: 18px;">See All</a>
      </div>
      <div class="d-flex flex-wrap justify-content-between sn-specific-product-wrapper">
        @forelse ($products as $p)
        <div class="sn-specific-product position-relative mb-3">
          <img src="{{ asset('images/icons/heart.png')}}" alt="" class="sn-heart">
          <a href="{{ url('/product_detail/' . $p->id) }}" class="text-decoration-none"><img src="{{ asset($p->OnePhoto->image)}}" alt="" class="sn-product-image w-100"></a>
          <a href="{{ url('/product_detail/'  . $p->id ) }}" class="text-decoration-none"><h4 class="mt-2 mb-1 mt-md-4 mb-md-2">Samsung Galaxy Z Fold</h4></a>
          <div class="d-flex justify-content-between align-items-center align-self-center mb-2">
            <div class="product-price">${{ $p->price }}</div>
            <button class="add-to-cart d-none d-md-block"><span class="">Add to cart</span> <i class="fas fa-shopping-cart"></i></button>
            <button class="add-to-cart-mobile d-block d-md-none"><span class=""><i class="fas fa-shopping-cart"></i></button>
          </div>
        </div>
        @empty
        <span>There is no product</span>
        @endforelse
      </div>
    </div>
  </div>
</section>
@endsection