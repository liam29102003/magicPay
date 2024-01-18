@extends('frontend.layouts.app')
@section('css')
.container {
    text-align: center;
  }

  .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .card {
    width: 18rem;
    margin: 1rem;
    border: 1px solid #ced4da;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffdf55;

  }

  .card-title i {
    margin-right: 8px;
  }

  .balance-icon {
    color: #28a745;
  }

  .account-icon {
    color: #007bff;
  }

  .owner-icon {
    color: #6610f2;
  }
@endsection
@section('content')
<div class="container">

    <div class="card-container mt-5">
      <div class="card">
        <div class="card-body">
          <p class="card-title"><i class="fas fa-user owner-icon"></i>Owner Name</p>
          <h5 class="card-text" id="ownerName">{{Auth::user()->name}}</h5>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <p class="card-title"><i class="fas fa-credit-card account-icon"></i>Account Number</p>
          <h5 class="card-text" id="accountNumber">{{$data->account_number}}</h5>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <p class="card-title"><i class="fas fa-dollar-sign balance-icon"></i>Balance</p>
          <h5 class="card-text" id="balance">{{$data->amount}}</h5>
        </div>
      </div>
    </div>
  </div>@endsection