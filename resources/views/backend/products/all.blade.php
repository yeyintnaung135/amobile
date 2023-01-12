@extends('backend.layout.app')
@section('title','A Mobile | Products List')
@push('style')
<style>
    .image{
        width: 70px;
    }
    @media screen and (max-width: 972px) {
        .mobile{
            display: none;
        }
    }
</style>
    
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12  mt-4">
                <!-- card start  -->
                <div class="card">
                    <div class="card-header">
                       <div class="d-flex justify-content-between">
                          <span>Product Lists</span>
                          <a href="{{ route('store_admin.product.create') }}" class="btn btn-sm btn-primary">Create Product</a>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" class="mobile" >Image</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="mobile">Description</th>
                              
                             
                                <th scope="col">
                                   action
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse ($products as $p)
                                <tr>
                                  <td scope="row">{{ $id++ }}</td>
                                  <td scope="row">{{ $p->title }}</td>
                                   <td class="mobile">
                                     <div class="image">
                                     @if ($p->Onephoto->image)
                                        <img src="{{ asset($p->OnePhoto->image)}}" alt="" class="w-100"> 
                                    @else
                                        <span> - </span>
                                    @endif
                                     </div>
                                   </td>
                                  <td scope="row">$ {{ $p->price }}</td>
                                  <td scope="row" class="mobile">{!! Str::words($p->description,9) !!}</td>
                                
                                   <td class="d-flex">
                                       <a href="{{ route('store_admin.product.edit',$p->id )}}" class="btn btn-info btn-sm mr-2">Edit</a>
                                       <form action="{{ route('store_admin.product.delete',$p->id )}}" method="post" id="productDelete" >
                                            @csrf
                                            @method('DELETE')
                                       </form>
                                       <button type="submit" form="productDelete" onclick="return confirm('Are you sure you want to delete this product?');" class="btn btn-danger btn-sm">Del</button>
                                   </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <span>There is no product</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </table>

                    </div> <!---- Card Body end --->
                    <div class="card-footer">
                       <!-- {{ $products->links() }} -->
                    </div>
                </div>
                <!-- card end  -->
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
      
    </script>
@endpush