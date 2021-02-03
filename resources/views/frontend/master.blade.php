<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="auth-check" content="{{ (Auth::check()) ? true : false }}">
    <title>MPMP</title>
    <link href="{{asset('/assets/img/pharmacy.jpg')}}" rel="shortcut icon" type="image/png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{asset('/frontend/css/mdb.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .multiple-select-dropdown li [type=checkbox]+label {
            height: 1rem;
        }
    </style>

</head>

<body class="category-v3 hidden-sn white-skin animated">

@include('frontend.header')

@yield('content')

@include('frontend.footer')


<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="{{asset('/frontend/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('/frontend/js/popper.min.js')}}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('/frontend/js/mdb.min.js')}}"></script>

<script type="text/javascript">
    /* WOW.js init */
    new WOW().init();

    // Tooltips Initialization
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });
</script>
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();
</script>
<script src="{{asset('/frontend/carts/shopingCart.js')}}"></script>
<script src="{{asset('sweetalert2/package/dist/sweetalert2.js')}}"></script>
<script src="{{asset('sweetalert2/package/dist/sweetalert2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@yield('js')
</body>

</html>
