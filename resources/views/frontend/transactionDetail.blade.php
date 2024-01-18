@extends('frontend.layouts.app')
@section('title')
    Transaction Details
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="card mt-3">
                    <div class="text-center">
                        <img src="{{ asset('admin/images/online-payment-outline.png') }}" alt="" class="w-50 mb-0 ">
                        {{-- <p class="mt-0">{{ $data->amount }}MMK</p> --}}
                        <div class="d-flex justify-content-between align-item-center px-3 mb-0">
                            <p>Transaction id : </p>
                            <p>{{ $data->id }}</p>
                        </div>
                        <hr class="bg-dark mx-3 mt-0">
                        <div class="mt-0 d-flex justify-content-between align-item-center px-3">
                            <p>Reference no : </p>
                            <p>{{ $data->ref_no }}</p>
                        </div>
                        <hr class="bg-dark mx-3 mt-0">

                        <div class="d-flex justify-content-between align-item-center px-3">
                            <p>Type : </p>
                            @if ($data->type == 1)
                                <p class="bg-success text-white rounded-3 px-1">Income</p>
                            @else
                                <p class="bg-danger text-white rounded-3 px-1">Expense</p>
                            @endif
                        </div>
                        <hr class="bg-dark mx-3 mt-0">
                        <div class="mt-0 d-flex justify-content-between align-item-center px-3">
                            <p>Amount : </p>
                            <p>{{ $data->amount }}</p>
                        </div>
                        <hr class="bg-dark mx-3 mt-0">
                        <div class="mt-0 d-flex justify-content-between align-item-center px-3">
                            <p>Date : </p>
                            <p>{{ $data->updated_at }}</p>
                        </div>
                        <hr class="bg-dark mx-3 mt-0">
                        <div class="mt-0 d-flex justify-content-between align-item-center px-3">
                            @if ($data->type == 1)
                            <p>From</p>
                            @else
                            <p>To</p>

                            @endif
                            
                            <p>{{ $data->source->name }}</p>
                        </div>
                        <hr class="bg-dark mx-3 mt-0">
                        <div class="mt-0 d-flex justify-content-between align-item-center px-3">
                            <p>Discription : </p>
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
