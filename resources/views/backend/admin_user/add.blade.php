@extends('backend.layouts.app')
@section('title')
    Admin Users
@endsection
@section('Search')

    
<h4><i class="fa-solid fa-users mx-2  bg-white shadow-sm  p-2 " style="border-radius: 4px"></i>Admin & Users Management</h4>
   
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <h4 class="card-header text-center">Create Admin/User</h4>
                    <div class="card-body card-block">
                        <form action="{{route('adminUsers.store')}}" method="post" class="form">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="phone" id="phone" name="phone" placeholder="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                <a href="{{route('adminUsers.index')}}"><button type = 'button'  class="btn btn-success btn-sm">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\StoreAdminUser','.form') !!}
    
@endsection