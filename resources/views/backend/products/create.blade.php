@extends('backend.layout.app')
@section('title','A Mobile | Product Create')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 mt-5">
                   <!-- card start  -->
                   <div class="card">
                    <div class="card-header">
                       <div class="d-flex justify-content-between w-100">
                          <div class="card-title"><i class="fas fa-users mr-1"></i>Create Product</div>
                          <div class=""><a href="{{ route('store_admin.users.list')}}"><i class="fas fa-list"></i></a></div>
                       </div>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('store_admin.product.store')}}" method="post">
                           @csrf
                            <div class="form-group">
                                <label for="productTitle">Title</label>
                                <input type="text" name="title" class="form-control @error('title')
                                    is-invalid
                                @enderror" id="productTitle" aria-describedby="emailHelp">
                                @error('title')
                                    <span class="font-weight-bolder text-danger">{{ $message}}</span>
                                @enderror
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" name="price" class="form-control @error('email')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                    <span class="font-weight-bolder text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control @error('role')
                                    is-invalid
                                @enderror" name="role" id="exampleFormControlSelect1">
                                    <option value="1">Phone</option>
                                    <option value="0">laptop</option>
                                </select>
                                @error('role')
                                    <span class="font-weight-bolder text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div> <!---- Card Body end --->
                </div>
                <!-- card end  -->
            </div>
        </div>
    </div>
@endsection