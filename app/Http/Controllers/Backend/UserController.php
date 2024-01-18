<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Wallet;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerator;
use App\Http\Requests\StoreUser;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminUser;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminUser $request)
    {
        DB::beginTransaction();
        try{
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->username);
            $user->save();      
            Wallet::firstOrCreate(
                [
                    'user_id'=> $user->id,
                ],
                [
                    'account_number'=>UUIDGenerator::accountNumber(),
                    'amount'=>0,
                ]
            )  ;
            DB::commit();
            return redirect()->route('users.index')->with(['create'=>'Created Successfully']);

        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return back()->with(['fail'=> 'Something wrong'])->withInput();
        }
       
    }

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
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        
        return view('backend.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, string $id)
    {
        $user =  User::findOrFail($id);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password ? Hash::make($request->username) : $user->password;
        $user->update();
        return redirect()->route('users.index')->with(['update'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        // dd($data);
        $data->delete();
        $response =[
            'message'=>'delete to cart complete',
            'status'=>'success'
        ];
        return response()->json($response, 200); 
    }
    public function ssd()
    {
        $users = User::query();
 
        
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
            $edit_icon =  '<a href="' . route("users.edit",$each->id) .' "class="text-warning mr-2"><i class="fa fa-edit"></i>
            </a>';
            $delete_icon =  "<a href='#' class='text-danger mr-2 delete' data-id = '".$each->id."'><i class='fa fa-trash'></i>
            </a>";
            return $edit_icon ."   ". $delete_icon;
        })
        ->rawColumns(['action','user_agent'])
        ->make(true);
    }
}
