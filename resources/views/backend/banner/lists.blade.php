@extends('backend.layout.app')
@section('title','A Mobile | Banner List')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <!-- card start  -->
                <div class="card">
                    <div class="card-header">
                       <div class="d-flex justify-content-between">
                          <span>  Banner Lists</span>
                          <a href="{{ route('store_admin.banner.create') }}" class="btn btn-sm btn-primary">Create Banner</a>
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
                                <th scope="col">Photo</th>
                             
                                <th scope="col">
                                   action
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse ($banner as $b)
                                <tr>
                                  <td scope="row">{{ $id++ }}</td>
                                   <td class="w-75">
                                     <div class="w-100">
                                       <img src="{{ asset($b->image)}}" alt="" class="w-25">
                                     </div>
                                   </td>
                                   <td>
                                       <a href="{{ route('store_admin.banner.edit',$b->id )}}" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="{{ route('store_admin.banner.delete',$b->id )}}" onclick="return confirm('Are you sure you want to delete this banner?');" class="btn btn-danger">
                                       <i class="fas fa-trash"></i>
                                       </a>
                                   </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <span>There is no banner</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </table>

                    </div> <!---- Card Body end --->
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