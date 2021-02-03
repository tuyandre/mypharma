<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="auth-check" content="{{ (Auth::check()) ? 'true' : 'false' }}">
    <title>@yield('title') | FLR</title>
    <link href="{{asset('/frontend/img/logo.png')}}" rel="shortcut icon" type="image/png">

    <link type="text/css" rel="stylesheet" href="{{asset('/frontend/cart/css/mdb.ecommerce.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/frontend/cart//css/mdb-pro.min.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('/frontend/cart/releases/v5.11.2/css/all.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/frontend/cart/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/backend/fontawesome/css/fontawesome.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/backend/fontawesome/css/all.min.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
</head>

<body class="skin-light">

@include('frontend.cartLayout.navbar')
@yield('content')


@include('frontend.cartLayout.footer')




<script src="{{asset('/frontend/cart/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/frontend/cart/js/mdb.ecommerce.min.js')}}"></script>
<script src="{{asset('/frontend/cart/js/mdb.min.js')}}"></script>
<script src="{{asset('/frontend/cart/js/bootstrap.js')}}"></script>
<script src="{{asset('/frontend/cart/js/popper.min.js')}}"></script>
<script src="{{asset('/frontend/carts/shopingCart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@yield('js')
</body>

</html>
