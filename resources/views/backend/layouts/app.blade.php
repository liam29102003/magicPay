<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <link href="{{asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="{{asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.cs') }}s" rel="stylesheet" media="all">
  <link href="{{asset('admin/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="{{asset('admin/css/theme.css') }}" rel="stylesheet" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

  <!-- icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('backend.layouts.headerMobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       @include('backend.layouts.sideBar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('backend.layouts.header')

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin/vendor/vector-map/jquery.vmap.world.js')}}"></script>
    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')
    <script>
        let token = document.head.querySelector('meta[name = "csrf-token"]');
        if(token)
        {
            $.ajaxSetup({
                headers : {
                    'X-CSRF_TOKEN' : token.content
                }
            })
        }
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        @if(session()->has('create'))
        Toast.fire({
        icon: 'success',
        title: '{{session()->get('create')}}'
        })
        @endif
        @if(session()->has('update'))
        Toast.fire({
        icon: 'success',
        title: '{{session()->get('update')}}'
        })
        @endif
    </script>


</body>

</html>
<!-- end document-->
