@extends('frontend.layouts.app')
@section('css')

    .main-card{
    background: #ffdf55;
    }
    .side-card:hover{
        transform:scale(1.03);
    }
 
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
            <img src="{{ asset('admin/images/money-transfer-monochromatic-2f0a1.png') }}" alt="" class="w-75">
        </div>
        <div class="col-lg-4 " style="">
            <div class="card main-card p-3 mt-4">
                <div class="container-lg-fluid ">
                    <div class="row">
                        <div class="text-center mb-2">
                            <img class="rounded-circle border border-4 border-light"
                                src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=Liam"
                                alt="Hello World">
                                <h6 class="mt-1">{{ucfirst(Auth::user()->name)}}</h6>
                                <h6 class="mt-1">{{$data->amount}}MMK</h6>


                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-6 ">
                            <a href="{{route('clientQrScan')}}">

                            <div class="card side-card">
                                
                                <div class="d-flex align-items-center justify-content-center m-2 ">
                                <div><img src="{{asset('admin/images/noun-scan-qr-6272679.png')}}" alt="" width="60">
                                </div>
                                <div>Scan & pay</div>
                            </div>
                        </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('clientQrReceive')}}">
                                <div class="card side-card">
                                    <div class="d-flex align-items-center justify-content-center p-2">
                                    <div><img src="{{asset('admin/images/noun-qr-code-5909702.png')}}" alt="" width="60">
                                    </div>
                                    <div>Receive QR</div>
                                </div></a>
                            
                            </div>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="side-card card pt-3 mt-2">
                            <a href='{{route('clientTransfer')}}' class="d-flex justify-content-between align-items-center">
                                <p><i class="fa-solid fa-money-bill-transfer me-2"></i>Transfer</p>
                                <p><i class="fa-solid fa-caret-right"></i></p>
                            </a>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="side-card card pt-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <p><i class="fa-solid fa-wallet me-2"></i>Walllet</p>
                                <p><i class="fa-solid fa-caret-right"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="side-card card pt-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <p><i class="fa-solid fa-right-left me-2"></i>Transaction</p>
                                <p><i class="fa-solid fa-caret-right"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
            <img src="{{ asset('admin/images/money-transfer-monochromatic-2f0a1.png') }}" alt="" class="w-75">
        </div>
    </div>
</div>
    
@endsection