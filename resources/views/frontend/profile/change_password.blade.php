@extends('frontend.layout.app')
@php
    $user = Auth::user();
@endphp
@push('style')
    <style>
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
    </style>
@endpush
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-4">
                       <div class="w-100 d-flex justify-content-center ">
                         <div class="p-4 profile border rounded-circle">
                            <img src="{{ asset('images/logos/admin.png')}}" class="w-100" alt="">
                          </div>
                       </div>
                       <h3 class="text-center">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="col-12 mb-2 d-flex justify-content-center">
                      <div class="d-flex bg-smoke justify-content-between w-100 rounded-1 mb-2">
                         <div class="p-3 align-items-center d-flex justify-content-around">
                            <i class="far fa-user"></i>
                            <a href="{{ route('home')}}"><span class="ml">My Profile</span></a>
                         </div>
                         <div class="p-3">
                            <i class="fas fa-angle-right"></i>
                         </div>
                      </div>
                    </div>
                    <div class="col-12 mb-2 d-flex justify-content-center">
                      <div class="d-flex bg-smoke justify-content-between w-100 rounded-1 mb-2">
                         <div class="p-3 d-flex align-items-center">
                         <i class="fas fa-cart-plus"></i>
                            <span class="ml">Orders</span>
                         </div>
                         <div class="p-3">
                            <i class="fas fa-angle-right"></i>
                         </div>
                      </div>
                    </div>
                    <div class="col-12 mb-2 d-flex justify-content-center">
                      <div class="d-flex bg-smoke justify-content-between w-100 rounded-1 mb-2">
                         <div class="p-3 d-flex align-items-center">
                         <i class="far fa-heart"></i>
                            <span class="ml">Wishlist</span>
                         </div>
                         <div class="p-3">
                            <i class="fas fa-angle-right"></i>
                         </div>
                      </div>
                    </div>
                    <div class="col-12 mb-2 d-flex justify-content-center">
                      <div class="d-flex bg-smoke justify-content-between w-100 rounded-1 mb-2">
                         <div class="p-3 d-flex align-items-center">
                         <i class="fas fa-map-marker-alt"></i>
                            <span class="ml">Billing Address</span>
                         </div>
                         <div class="p-3">
                            <i class="fas fa-angle-right"></i>
                         </div>
                      </div>
                    </div>
                    <div class="col-12 mb-2 d-flex justify-content-center">
                      <div class="d-flex bg-smoke justify-content-between w-100 rounded-1 mb-2">
                         <div class="p-3 d-flex align-items-center">
                         <i class="far fa-eye"></i>
                            <a href="{{ route('change_password')}}"> <span class="ml">Change Password</span></a>
                         </div>
                         <div class="p-3">
                            <i class="fas fa-angle-right"></i>
                         </div>
                      </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-12 d-flex justify-content-between p-3">
                    <h3 class="font-weight-bolder">Change Password</h3>
                    <a href="" class="">Edit</a>
                </div>
                <div class="row">
                    @if(Session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-12 p-5">
                        <form method="post" action="{{ route('change_password.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password')
                                    is-invalid
                                @enderror" id="oldPassword">
                                @error('current_password')
                                    <span class="text-danger font-weight-bolder">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control @error('new_password')
                                    is-invalid
                                @enderror" name="email" id="exampleInputEmail1">
                                @error('new_password')
                                    <span class="text-danger font-weight-bolder">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Confirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('email')
                                    is-invalid
                                @enderror" name="email" id="exampleInputEmail1">
                                @error('new_confirm_password')
                                    <span class="text-danger font-weight-bolder">{{ $message}}</span>
                                @enderror
                            </div>
                         
                            <div class="w-100 d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary bg-blue-dark" >Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
