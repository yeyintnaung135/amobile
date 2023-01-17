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
      @forelse ($posts as $p)
      <div class="col-sm col-md-4 mb-4">
        <img src="{{ asset($p->img)}}" alt="" class="w-100">
        <h4 class="mt-3">{{ $p->title }}</h4>
        <p class="text-secondary my-2">
         {!! Str::words($p->description,20) !!}
        </p>
        <span class="news-date">{{ $p->created_at->format('M d Y')}}</span>
      </div>
      @empty
        
      @endforelse

    </div>
  </div>
</section>
@endsection