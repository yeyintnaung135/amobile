@extends('frontend.layout.app')
@section('title','A-Mobile | User Wishlists')
@php
    $user = Auth::user();
    $url = 'http://127.0.0.1:8000/';
@endphp
@push('style')
    <style>
        .user-active{
                font-weight: 900;
         }
        .profile{
            width: 100px;
            height: 100px;
        }
        .bg-smoke{
            background-color: #f5f5f5;
        }

        .ml{
            margin-left: 10px;
        }
        .bg-blue-dark{
            background-color: #101d30;
        }

        .wishlist-card{
            width: 100%;
            height: 250px;
        }

        .wishlist-card-header{
            background-color: #f5f5f5;
            height: 150px;
            overflow: hidden;
        }
        .wishlist-card-header img{
          object-fit: contain;

          transition: .8s ease-in-out;
          cursor: pointer;
        }

        .wishlist-card-header img:hover{
            transform: scale(1.2);
        }

        .product-title{
            font-weight: 900;
            font-size: 15px;
        }
    </style>
@endpush
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            @include('frontend.profile.sidebar')
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-12 d-flex justify-content-between p-3">
                    <h3 class="font-weight-bolder">Wishlist</h3>
                    <a href="" class="">Edit</a>
                </div>
                <div class="row">
                   @forelse ($wishlists as $p)
                    <div class="col-lg-3 col-6 p-1">
                        <div class="wishlist-card border rounded-2">
                            <div class="wishlist-card-header card-header">
                                <a href="{{ route('product_detail',$p->Product->id)}}">
                                    @if(isset($p->Product->OnePhoto->image))
                                         <img src="{{ asset($p->Product->OnePhoto->image)}}" alt="product photo" class="w-100 h-100">
                                    @else
                                        <img src="{{ asset('images/assets/default_product.png')}}" alt="product photo" class="w-100 h-100 default-photo-bg">
                                    @endif
                            
                                </a>
                            </div>
                            <div class="wishlist-card-body p-3">
                               <div class="mb-3">
                                  <a href="{{ route('product_detail',$p->Product->id)}}" class="product-title">{{ $p->Product->title}}</a>
                               </div>
                               <div class="">
                                  <span class="text-info font-weight-bolder">$ {{ $p->Product->price}}</span>
                               </div>
                            </div>
                        </div>
                    </div>
                   @empty
                       <div class="col-12  d-flex justify-content-center align-items-center">
                         <h3>There is no wishlist</h3>
                       </div>
                   @endforelse
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
