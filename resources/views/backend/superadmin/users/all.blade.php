@extends('backend.layout.app')
@section('title','A Mobile | Users List')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <!-- card start  -->
                <div class="card">
                    <div class="card-header">
                       <div class="d-flex justify-content-between">
                          <span> <i class="fas fa-users mr-1"></i> Admin Lists</span>
                          <a href="{{ route('store_admin.user.create') }}" class="btn btn-sm btn-primary">Create User</a>
                       </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="d-flex justify-content-end my-3 align-items-center">
                            <div class="form-group mr-md-2">
                                <fieldset>
                                <legend>From Date</legend>
                                <input type="text" id='search_fromdate_customer' class="customerdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                </fieldset>
                            </div>
                            <div class="form-group mr-md-2">
                                <fieldset>
                                <legend>To Date</legend>
                                <input type="text" id='search_todate_customer' class="customerdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                </fieldset>
                            </div>
                            <div class="pr-md-4">
                                <input type='button' id="customer_search_button" value="Search" class="btn bg-info"  >
                            </div>
                        </div> -->
                        <table id="adminListTable" class="table table-borderless">
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Role</td>
                                    <td>Create Date</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
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
        $('#adminListTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              'url': "{{ route('store_admin.get_admin_list.datatable') }}",
            //   method: "POST",
            //   'data': function(data){
            //       // Read values
            //       var from_date = $('#search_fromdate_customer').val() ? $('#search_fromdate_customer').val() + " 00:00:00" : null;
            //       var to_date = $('#search_todate_customer').val() ? $('#search_todate_customer').val() + " 23:59:59" : null;

            //       // Append to data
            //       data.searchByFromdate = from_date;
            //       data.searchByTodate = to_date;
            //   }
          },
          columns: [
              {data: 'id'},
              {data: 'name'},
              {data: 'email'},
              {
                data: 'role',
                render: function(data, type) {
                    if(data == 1){
                        var role = `<span class="badge badge-danger">ADMIN</span>`;
                      
                    }else{
                        var role = `<span class="badge badge-primary">STAFF</span>`;
                    }
                    return  role;
                }
              },
              {data: 'created_date'},
              {
                data: 'action',
                render: function(data, type) {
                    // var detail = `<a href="{{url('product/detail/'. ':id')}}" type="button" style=" width: 81px;" class="btn btn-primary btn-sm mr-2">
                    //                 <i class="fa fa-info-circle"></i>
                    //                 Detail
                    //             </a>`;
                    var edit = `<a href="{{url('backend/products/edit/'.':id')}}" type="button" class="btn btn-info btn-sm ">
                        <i class="fa fa-edit"></i>
                       
                    </a>`;
                    // detail=detail.replace(':id', data);
                    edit=edit.replace(':id', data);
                    return  edit;
                }
              },
              {data: 'created_at'},
          ],

          responsive: true,
          lengthChange: true,
          autoWidth: false,
          paging: true,
          dom: 'Blfrtip',
          buttons: ["copy", "csv", "excel", "pdf", "print"],
          columnDefs: [
              { responsivePriority: 1, targets: 1 },
              { responsivePriority: 2, targets: 2 },
              { responsivePriority: 3, targets: 3},
              { responsivePriority: 4, targets: 4},
              {
                  'targets': [4],
                  'orderable': false,
              },
              {
                  'targets': [6],
                  'orderable': false,
                   'visible': false,
                   'searchable': false,  
              },
            
          ],
          language: {
              "search" : '<i class="fas fa-search"></i>',
              "searchPlaceholder": 'Search',
              paginate: {
                  next: '<i class="fa fa-angle-right"></i>', // or '→'
                  previous: '<i class="fa fa-angle-left"></i>' // or '←'
              }
          },

          "order": [[ 6, "desc" ]],
      });
    </script>
@endpush