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
                          <span>Post Lists</span>
                          <a href="{{ route('store_admin.post.create') }}" class="btn btn-sm btn-primary">Create Post</a>
                       </div>
                    </div>
                    <div class="card-body">
                    @if (Session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session('success')}}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" class="mobile" >Image</th>                           
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
                                @forelse ($posts as $p)
                                <tr>
                                  <td scope="row">{{ $id++ }}</td>
                                  <td scope="row">{{ $p->title }}</td>
                                   <td class="mobile">
                                     <div class="image">
                                    
                                        <img src="{{ asset($p->img)}}" alt="" class="w-100"> 
                                 
                                     </div>
                                   </td>
                                 
                                  <td scope="row" class="mobile">{!! $p->description !!}</td>
                                
                                   <td class="d-flex">
                                       <a href="{{ route('store_admin.post.edit',$p->id )}}" class="btn btn-info btn-sm mr-2"> <i class="fas fa-edit"></i></a>
                                       <form action="{{ route('store_admin.post.delete',$p->id )}}" method="post" id="postDelete" >
                                            @csrf
                                            @method('DELETE')
                                       </form>
                                       <button type="submit" form="postDelete" onclick="return confirm('Are you sure you want to delete this product?');" class="btn btn-danger btn-sm">
                                       <i class="fas fa-trash"></i> 
                                       </button>
                                   </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <span>There is no post</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </table>

                    </div> <!---- Card Body end --->
                    <div class="card-footer">
                 
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