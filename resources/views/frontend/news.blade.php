@extends('frontend.layout.app')

@push('style')
<style>
  a:hover {
    color: #000;
  }
  h3, h4 {
    font-weight: 900;
  }
  .sn-news img {
    aspect-ratio: 3/2;
    object-fit: cover;
    border-radius: 5px;
  }
  
  /* Tablet */
  @media (max-width: 767px) {
    
  }

  /* Mobile */
  @media screen and (max-width: 480px) {
    
  }
</style>
@endpush

@section('content')
<section class="row justify-content-center px-3 px-lg-5 py-4">
  <div class="container">
    <div class="row sn-news">
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset('images/news/news1.jpg')}}" alt="" class="w-100">
        <h4 class="mt-3">Latest Samsung Galaxy Z Fold</h4>
        <p class="text-secondary my-2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <span class="news-date">Nov22, 2023</span>
      </div>
    </div>
  </div>
</section>
@endsection