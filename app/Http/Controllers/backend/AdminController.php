<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\traid\UserRole;

class AdminController extends Controller
{
    use UserRole;
    public function index()
    {
        if($this->isSuperAdmin() || $this->isStaff()){
            return view('backend.superadmin.dashboard');
        }
       
    }

    public function users_list()
    {
        if($this->isSuperAdmin()){
            return view('backend.superadmin.users.all');
        }
        
    }

    public function create()
    {
        if($this->isSuperAdmin()){
            return view('backend.superadmin.users.create');
        }
      
    }

    public function get_admin_list_datatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page
  
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
  
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
  
        // $searchByFromdate = $request->get('searchByFromdate');
        // $searchByTodate = $request->get('searchByTodate');
  
  
        // if($searchByFromdate == null) {
        //   $searchByFromdate = '0-0-0 00:00:00';
        // }
        // if($searchByTodate == null) {
        //   $searchByTodate = Carbon::now();
        // }
  
        $totalRecords = User::select('count(*) as allcount')
                        ->where(function ($query) use($searchValue) {
                          $query->where('name', 'like', '%' . $searchValue . '%')
                                ->orWhere('created_at', 'like', '%' . $searchValue . '%');
                                
                        })->count();
                        // ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])->count();
        $totalRecordswithFilter = $totalRecords;
  
        $records = User::orderBy($columnName, $columnSortOrder)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) use($searchValue) {
              $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'like', '%' . $searchValue . '%');
                
            })
            // ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->select('users.*')
            // ->withTrashed()
            ->skip($start)
            ->take($rowperpage)
            ->get();
  
        $data_arr = array();
  
        foreach ($records as $record) {
          $data_arr[] = array(
              "id"=>$record->id,
              "name" => $record->name,
              "email" => $record->email,
              "role" => $record->role,
              "action" => $record->id,
              "address" => $record->address,
              "created_at" => $record->created_at,
          );
        }
  
        $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordswithFilter,
          "aaData" => $data_arr,
        );
        echo json_encode($response);
    }
}
