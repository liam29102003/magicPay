@extends('frontend.layouts.app')
@section('css')
.side-card {
    background-color: #f5eadf;
}

.accordion-button,
#flush-collapseOne {
    background-color: #f5eadf;
    color: #4a8854;
}
.main-card {
    background-color: #ffdf55;
    /* border: 3px solid  #fbb700; */
}

.user-details-section {
    border-radius: 10px;
    overflow: hidden;
}

.user-details-section img {
    transition: transform 0.3s ease-in-out;
}

.user-details-section:hover img {
    transform: scale(1.1);
}

.accordion-button:not(.collapsed) {
    background-color: #f5eadf;
    color: #4a8854;
}
@endsection
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
            <img src="{{ asset('admin/images/personal-data-monochromatic.png') }}" alt="" class="w-75">
        </div>
        <div class="col-lg-4 ">
            <div class="row">

                <div class="col-lg-12   pt-0">
                    <div class="flex-grow p-4 user-details-section mt-1 container ">
                        <div class="card shadow border-0 main-card">
                            <div class="card-body p-3">
                                <div class="text-center ">
                                    <img class="rounded-circle border border-4 border-light"
                                        src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=Liam"
                                        alt="Hello World">
                                </div>
                                <div class="card p-2  border-0  pb-0 mt-3 side-card">
                                    <div class="d-flex justify-content-between  p-0 pb-0 ">
                                        <p class="text-start  mb-0 pb-0">Username: </p>
                                        <p class="text-end">John Doe</p>
                                    </div>
                                </div>
                                <div class="card p-2 border-0 side-card  pb-0 mt-2">
                                    <div class="d-flex justify-content-between  ">
                                        <p class="text-start">Phone: </p>
                                        <p class="text-end">09693559757</p>
                                    </div>
                                </div>
                                <div class="card p-2 border-0 side-card  pb-0 mt-2">
                                    <div class="d-flex justify-content-between  ">
                                        <p class="text-start">Email: </p>
                                        <p class="text-end">JohnDoe@gmail.com</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn  mt-3 shadow-sm">
                                        Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-0  pt-0">
                <div class="col-lg-12 ">
                    <div class="flex-grow p-4 user-details-section pt-0 container">
                        <div class="card border-0 shadow main-card">
                            <div class="card-body p-3">
                                @if(session()->has('fail'))
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    <p class="fs-6">{{session()->get('fail')}}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                @if(session()->has('success'))
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    <p class="fs-6">{{session()->get('success')}}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                <div class="accordion  " id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button  p-2 collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Change Password
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse "
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">

                                                <form action="{{ route('clientUpdatePassword') }}"
                                                    class="form  text-center" method="POST">
                                                    @csrf
                                                    <div class="d-lg-flex d-block justify-content-between ">
                                                        <input name="oldPassword"
                                                            type="password" class="form-control  me-lg-1"
                                                            placeholder="old password">

                                                        <input name="newPassword" type="password"
                                                            class="form-control ms-lg-1 mt-2 mt-lg-0"
                                                            placeholder="new password">
                                                    </div>
                                                    
                                                    <button class="btn btn-sm mt-2">Update</button>
                                                    <button class="btn btn-sm mt-2" type="reset">Clear</button>



                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <button class="btn mt-3 shadow-sm " id ="logout">
                                        Logout
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 d-lg-flex d-none align-items-center justify-content-center">
            <img src="{{ asset('admin/images/personal-data-monochromatic.png') }}" alt="" class="w-75">
        </div>
    </div>


</div>
    
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#logout', function(e) {
                // console.log("Hello");
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Do you want to logout?',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        $.ajax({
                            url:'{{route('logout')}}' ,
                            method: 'POST',
                            headers: {
       		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	},                            dataType: 'json',

                            success: function()
                            {
                                window.location.replace('{{route('login')}}');
                            }
                        })
                    // Toast.fire({
                    //     icon: 'success',
                    //     title: 'Successfully deleted'
                    // })

                    }
                })
            });
        })
    </script>
@endsection
