@extends('frontend.layouts.app')
@section('title')
    Receive QR
@endsection
@section('content')
    <div class="col-lg-4 offset-lg-4">
        <div class="card py-3 mt-3">
            
            <div class="text-center">
                <p class="mb-3">Scan QR code to pay</p>
                {{QrCode::size(200)->generate(Auth::user()->phone)}}
                <p class="mt-3 mb-0">{{Auth::user()->name}}</p>
                <p>{{Auth::user()->phone}}</p>

            </div>
        </div>


    </div>
@endsection