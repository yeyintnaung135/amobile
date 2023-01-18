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
                       <div class="w-100 d-flex justify-content-center mb-3">
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
                            <span class="ml">My Profile</span>
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
                            <a href="{{ route('billing_address')}}"><span class="ml">Billing Address</span></a>
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
                    <h3 class="font-weight-bolder">My Profile</h3>
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
                        <form method="post" action="{{ route('user.update', $user->id )}}">
                            @csrf
                            <div class="mb-3">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" name="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" id="userName" value="{{ old('name',$user->name) }}">
                                @error('name')
                                    <span class="text-danger font-weight-bolder">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email')
                                    is-invalid
                                @enderror" name="email" id="exampleInputEmail1"value="{{ old('email',$user->email) }}">
                                @error('email')
                                    <span class="text-danger font-weight-bolder">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone',$user->phone)}}">

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
