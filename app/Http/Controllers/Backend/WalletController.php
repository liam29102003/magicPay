<?php

namespace App\Http\Controllers\Backend;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function index()
    {
        return view("backend.wallet.index");
    }
    public function ssd()
    {
        $users = Wallet::with('user');
 
        
        return DataTables::of($users)
        ->editColumn('created_at',function($each)
        {
            return $each->created_at->format('d-m-Y h:i a');
        })
        ->editColumn('updated_at',function($each)
        {
            return $each->updated_at->format('d-m-Y h:i a');
        })
        ->editColumn('amount',function($each)
        {
            return number_format($each->amount,2);
        })
        ->addColumn('account_person',function($each)
        {
            $user = $each->user;
            if($user)
            {
                return "<div style='line-height:2.0;'><p>Name : ".$user->name."</p><p>Email : ".$user->email."</p><p>Phone : ".$user->phone."</p></div>";
            }
            else{
                return "-";
            }
        })
        
       
        ->rawColumns(['account_person'])
        ->make(true);
    }
}
