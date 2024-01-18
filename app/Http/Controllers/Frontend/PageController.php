<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerator;
use App\Http\Requests\transfer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\updatePassword;

class PageController extends Controller
{
    public function index()
    {
        $urlname = url()->current();
        $data = Wallet::where('user_id', Auth::user()->id)->first();
        return view('frontend.home')->with(['urlname' => $urlname, 'data' => $data]);
    }
    public function profile()
    {
        return view('frontend.profile');
    }
    public function updatePassword(updatePassword $request)
    {
        $request->validated();
        if (Hash::check($request->input('oldPassword'), Auth::user()->password)) {
            $request->user()->password = Hash::make($request->input('newPassword'));
            $request->user()->update();
            return redirect(route('clientProfile'))->with(['success' => 'Successfully updated']);
        } else {
            return redirect(route('clientProfile'))->with(['fail' => 'Old Password doesn\'t match']);
        }
    }
    public function wallet()
    {
        // dd(Auth::user()->id);
        $data = Wallet::where('user_id', Auth::user()->id)->first();
        // dd($data);
        return view('frontend.wallet')->with(['data' => $data]);
    }

    public function transfer()
    {
        $data = User::get();
        // dd($data->user_id);
        return view('frontend.transfer')->with(['data' => $data]);
    }
    public function transferCheck(Request $request)
    {
        $allData = $request->all();
        $password = Hash::check($allData['password'], Auth::user()->password);
        if ($password) {

            $from_account = Wallet::where('user_id', Auth::user()->id)->first();
            if ($from_account->amount > $request->amount) {
                DB::beginTransaction();

                try {
                    $from_account->amount = $from_account->amount - $request->amount;

                    $from_account->update();

                    $to_user_id = User::where('phone', $request->to)->first()->id;

                    $to_account = Wallet::where('user_id', $to_user_id)->first();
                    $to_account->amount = $to_account->amount + $request->amount;
                    $to_account->update();
                    $uuid = new UUIDGenerator();
                    $from_transaction = new Transaction();
                    $to_transaction = new Transaction();

                    $from_transaction->ref_no = $to_transaction->ref_no = $uuid->refNumber();
                    $from_transaction->user_id = $to_transaction->source_id =  Auth::user()->id;

                    $to_transaction->amount = $from_transaction->amount =  $request->amount;
                    $from_transaction->source_id = $to_transaction->user_id =  $to_user_id;
                    $from_transaction->description = $to_transaction->description = $request->description;



                    $from_transaction->type = 2;
                    $to_transaction->type = 1;


                    $from_transaction->save();
                    $to_transaction->save();




                    DB::commit();

                    return back()->with(['success' => 'Successfully transfer']);
                } catch (Exception $e) {
                    dd($e);
                    DB::rollBack();
                }
            } else {

                return back()->with(['wrong' => 'Insufficient amount']);
            }
        } else {
            // dd('fail');
            return back()->with(['wrong' => 'Password is wrong']);
        }
    }
    public function transaction()
    {
        $data = Transaction::where('user_id', Auth::user()->id)->paginate(5);
        return view('frontend.transaction', compact('data'));
    }
    public function transactionDetail($id)
    {
        $data = Transaction::where('user_id', Auth::user()->id)->where('id', $id)->first();
        return view('frontend.transactionDetail', compact('data'));
    }

    public function qrReceive()
    {
        return view('frontend.qrReceive');
    }
    public function qrScan()
    {
        return view('frontend.qrScan');
    }
    public function qrScanPay(Request $request)
    {
        dd($request->all());
    }
}
