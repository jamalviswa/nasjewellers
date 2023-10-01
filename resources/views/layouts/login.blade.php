<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>N.A.S Jewellers - Salem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="N.A.S Jewellers,Idappadi,Salem" name="description" />
    <meta content="N.A.S" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::to('images/logo.png')}}">

    <!-- preloader css -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/preloader.min.css') }}" type="text/css" /> -->

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ URL::asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ URL::asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Sweetalert Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}">

</head>

<body>

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="" class="d-block auth-logo">
                                        <img src="{{URL::to('images/logo.png')}}" alt="NAS" height="100" width="100">
                                    </a>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner Section Start -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>

                        <!-- Start bubble effect -->
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->

                    </div>
                </div>
                <!-- Banner Section End -->

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::asset('libs/feather-icons/feather.min.js') }}"></script>

    <!-- pace js -->
    <script src="{{ URL::asset('libs/pace-js/pace.min.js') }}"></script>

    <!-- password addon init -->
    <script src="{{ URL::asset('js/pages/pass-addon.init.js') }}"></script>

    <!-- Sweetalert JS -->
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>

    <?php
    if (session()->has('message')) {
        $success = session()->get('message');
        $type = session()->get('alert-class');
    ?>
        <script>
            swal({
                title: "<?php echo ($type == 'success') ? 'Success' : "Error" ?>",
                text: "<?php echo $success; ?>",
                type: "<?php echo $type; ?>",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    <?php }
    ?>

</body>

</html>