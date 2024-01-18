<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminUser;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminUser;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\UpdateAdminUser;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admin_user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin_user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminUser $request)
    {
        // $this->validateData($request);
        $admin_user = new AdminUser();
        $admin_user->name = $request->username;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = Hash::make($request->username);
        $admin_user->save();
        return redirect()->route('adminUsers.index')->with(['create'=>'Created Successfully']);
        // dd($request->all());
    }
    //Validate data
    // private function validateData($request)
    // {
    //     Validator::make($request->all(),[
           
    //     ])->validate();
    // }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $data = AdminUser::findOrFail($id);
        
        return view('backend.admin_user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminUser $request,  $id)
    {
        $admin_user =  AdminUser::findOrFail($id);
        $admin_user->name = $request->username;
        $admin_user->email = $request->email;
        $admin_user->phone = $request->phone;
        $admin_user->password = $request->password ? Hash::make($request->username) : $admin_user->password;
        $admin_user->update();
        return redirect()->route('adminUsers.index')->with(['update'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = AdminUser::findOrFail($id);
        $data->delete();
        $response =[
            'message'=>'delete to cart complete',
            'status'=>'success'
        ];
        return response()->json($response, 200);   
     }
    public function ssd()
    {
        $users = AdminUser::query();
 
        
        return DataTables::of($users)
        ->editColumn('created_at',function($each)
        {
            return $each->created_at->format('d-m-Y h:i a');
        })
        ->editColumn('updated_at',function($each)
        {
            return $each->updated_at->format('d-m-Y h:i a');
        })
        ->editColumn('user_agent',function($each)
        {
            if($each->user_agent)
            {
            $agent = new Agent();
            $agent->setUserAgent($each->user_agent);
            $device = $agent->device();
            $platform = $agent->platform();
            $browser = $agent->browser();
            
            return '<table class="table table-sm table-bordered">
                        <tbody> 
                            <tr>
                                <td>Device</td>
                                <td>'.$device.'</td>
                            </tr>
                            <tr>
                                <td>PlatForm</td>
                                <td>'.$platform.'</td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td>'.$browser.'</td>
                            </tr>

                        </tbody>
                    </table>';
            }
            else{
                return '-';
            }

        })
        ->addColumn('action', function($each) {
            $edit_icon =  '<a href="' . route("adminUsers.edit",$each->id) .' "class="text-warning mr-2"><i class="fa fa-edit"></i>
            </a>';
            $delete_icon =  "<a href='#' class='text-danger mr-2 delete' data-id = '".$each->id."'><i class='fa fa-trash'></i>
            </a>";
            return $edit_icon ."   ". $delete_icon;
        })
        ->rawColumns(['action','user_agent'])
        ->make(true);
    }
}
