<!--Navigation-->
<header>

    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">
        <div class="container">
            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">

            </div>
            <a class="navbar-brand font-weight-bold" href="{{url('/')}}">
                <strong>MPMP</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{route('frontend.medicine.all')}}">
                            <i class="fa fa-medkit blue-text" aria-hidden="true"></i> Medecines
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @if(Auth()->check())
                        <li class="nav-item ml-3">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{route('frontend.patient.order')}}">
                                <i class="fas fa-shopping-bag blue-text"></i> My Orders</a>
                        </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{route('frontend.cart')}}">
                            <span class="total-count badge badge-pill red"></span> <i class="fa fa-shopping-cart "></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user blue-text"></i> {{Auth::user()->name}} </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{route('logout')}}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @else
                        <li class="nav-item ml-3">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold btn-info" href="{{url('/register')}}">
                                <i class="fa fa-pencil blue-text"></i> Register</a>
                        </li>

                        <li class="nav-item ml-3">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold btn-primary" href="{{url('/login')}}">
                                 Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.Navbar -->

</header>
<!-- /.Navigation -->
