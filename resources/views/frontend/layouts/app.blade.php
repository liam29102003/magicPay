{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html,
        body {
            height: 110vh;
        }

        .side-card {
            background-color: ;
        }

        body {
            color: #4a8854;
            /* background-image: url('../../public/admin/images/v1008-24-b.jpg'); */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-color: #fff;
        }

        .main-card {
            background: #ffdf55;
        }

        .side-card {
            background-color: #f5eadf;
        }

        .title-section {
            background-color: #CFE3CB;
            border: 1px solid #4a8854;
        }

        .circle {
            position: fixed;
            left: 0;
            right: 0;
            margin: auto;
            bottom: 45px;
            background: #ffdf55;
            width: fit-content;
            padding: 20px;
            color: #b6dc98;
            border-radius: 100%;
            border: 4px solid #fff;
            animation: glow 5s infinite;
        }

        @yield('css')

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            background-color: #b6dc98;
            border: 1px solid #4a8854;
        }

        .footer a {
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #ffd700;
            /* change the color on hover */
        }

        .btn {
            background-color: #CFE3CB;
        }

        a {
            color: #4a8854;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 -10px #ffd700;
            }

            40% {
                box-shadow: 0 0 15px #ffd700;
            }

            60% {
                box-shadow: 0 0 15px #ffd700;
            }

            0% {
                box-shadow: 0 0 -10px #ffd700;
            }
        }
    </style>
    <title>User Profile</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Title Section -->
    <div class="title-section d-flex p-1">

        <div class="container justify-content-lg-center align-items-center d-flex">
            @if (url()->current() == 'http://localhost/MagicPay/magicPay/public/client/home')
                <a href="#" class="fs-2 d-none"><i class="fa-solid fa-arrow-left"></i></a>
            @else
                <a href="{{ route('clientHome') }}" class="fs-2 "><i class="fa-solid fa-arrow-left"></i></a>
            @endif
        </div>
        <div class="container justify-content-center align-items-center d-flex">
            <h1 class=" font-semibold  text-center">@yield('title')</h1>
        </div>
        <div class="container justify-content-end justify-content-lg-center align-items-center d-flex">
            <a href="#" class="fs-2"><i class="fa-solid fa-bell"></i></a>
        </div>
    </div>

    <!-- User Details Section -->
    @yield('content')



    <!-- Navigation Footer -->
    <div class="footer p-3 pb-0 mt-auto  px-0">
        <div class="container-fluid  pb-0 ">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="circle">
                        <a href="#" class="  text-decoration-none text-center">
                            <h2 class=" mb-0"><i class="fas fa-qrcode mb-0"></i>
                            </h2>
                        </a>
                    </div>
                    <div class="container-fluid  pb-0 ">
                        <div class="row">
                            <div class="col-2 ">
                                <a href="{{ route('clientHome') }}" class="  text-decoration-none ">
                                    <div class="text-center ">
                                        <i class="fas fa-home"></i>
                                        <p class="">Home</p>
                                    </div>

                                </a>
                            </div>
                            <div class="col-1"></div>

                            <div class="col-2">
                                <a href="{{ route('clientWallet') }}" class="  text-decoration-none ">
                                    <div class="text-center ">
                                        <i class="fa-solid fa-wallet"></i>
                                        <p class="">Wallet</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2 bg-">

                            </div>

                            <div class="col-2  px-0">
                                <a href="{{ route('clientTransaction') }}" class="  text-decoration-none">
                                    <div class="text-center ">
                                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                        <p class="">Transaction</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-1"></div>

                            <div class="col-2">
                                <a href="{{ route('clientProfile') }}" class="  text-decoration-none  ">
                                    <div class=" text-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p>Profile</p>
                                    </div>
                                </a>
                            </div>
                        </div>





                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.2/dist/cdn.min.js"></script>

    <script>
        $(document).ready(function() {
            // let token = document.head.querySelector('meta[name = "csrf-token"]');
            // if (token) {
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF_TOKEN': token.content,
            //             'Content-Type': 'application/json',
            //             'Accept': 'application/json'

            //         }
            //     })
            // }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });
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

        })
    </script>
    @yield('script')

</body>

</html>
