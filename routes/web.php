<?php

// use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\WalletController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\PageController as BPageController;
use App\Http\Controllers\Frontend\PageController as FPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/buu', function () {
//     return view('view');
// });
Route::get('/dashboard', [BPageController::class,'index']);
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware([
    'auth:sanctum,admin_users',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin_users/dashboard', [BPageController::class,'index']
    )->name('dashboard');
});


Route::prefix('admin_users')->middleware(['admin_users'])->group(function()
{  
    Route::get('login',[AdminController::class,'loginForm']);
    Route::post('login',[AdminController::class,'store'])->name('admin_users.login');

    //admin
    Route::resources(['adminUsers'=>AdminUserController::class]); 
    Route::get('dataTable/ssd',[AdminUserController::class,'ssd']);
    Route::get('destroy{id}',[AdminUserController::class,'destroy'])->name('adminUsers.delete');

    //users
    Route::resources(['users'=>UserController::class]);
    Route::get('userdataTable/ssd',[UserController::class,'ssd']);
    Route::get('destroy{id}',[UserController::class,'destroy'])->name('users.delete');

    //wallets
    Route::get('wallet/index',[WalletController::class,'index'])->name('wallet.index');
    Route::get('wallet/dataTable/ssd',[WalletController::class,'ssd']);
});
Route::prefix('client')->middleware(['auth'])->group(function()
{
        Route::get('/',[FPageController::class,'index']);
        Route::get('/home',[FPageController::class,'index'])->name('clientHome');
        Route::get('/profile',[FPageController::class,'profile'])->name('clientProfile');
        Route::post('updatePassword',[FPageController::class,'updatePassword'])->name('clientUpdatePassword');
        Route::get('/wallet',[FPageController::class,'wallet'])->name('clientWallet');
        Route::get('/transfer',[FPageController::class,'transfer']);
        Route::post('/transfer',[FPageController::class,'transferCheck'])->name('clientTransfer');
        Route::get('/transaction',[FPageController::class,'transaction'])->name('clientTransaction');
        Route::get('/transaction/{id}',[FPageController::class,'transactionDetail'])->name('clientTransactionDetail');
        Route::get('/qrReceive',[FPageController::class,'qrReceive'])->name('clientQrReceive');
        Route::get('/qrScan',[FPageController::class,'qrScan'])->name('clientQrScan');
        Route::get('/qrScanPay',[FPageController::class,'qrScanPay'])->name('clinetQrScanPay');
    });



