@extends('frontend.master')

@section('content')
<br>
<br>
<br>
    <!-- Mega menu -->
    <div class="container-fluid mx-0 px-0">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">
            <div class="container">

                <!-- Navbar brand -->
                <a class="font-weight-bold white-text mr-4" href="#">All  Medecines</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">


                    </ul>
                    <!-- Links -->

                    <!-- Search form -->
                    <form class="search-form" role="search" action="{{route('frontend.medicine.search')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group md-form my-0 waves-light">
                                    <input type="text" class="form-control" name="medicines" placeholder="Search">
                                    <input id="latitude" name="latitude" type="hidden">
                                    <input id="longitude" name="longitude"  type="hidden">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group md-form my-0 waves-light">
                                    <input type="submit" class="form-control btn btn-info" value="Search">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->

    </div>
    <!-- /Mega menu -->



    <!-- /.Main Container -->
    <div class="container">
        <div class="row pt-4">

            <!-- Content -->
            <div class="col-lg-12">



                <!-- Products Grid -->
                <section class="section pt-4">

                <?php
                $medicines=\App\Medecine::with(['Pharmacy'])->paginate(9);


                ?>
                <!-- Grid row -->
                    <div class="row">
                    @foreach($medicines as $medicine)

                        <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-4">

                                <!--Card-->
                                <div class="card card-ecommerce">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="{{asset('/backend/medecines/'.$medicine->image)}}" class="img-fluid" alt="" style="height: 250px;">
                                        <a href="{{route('frontend.medicine.detail',['id'=>$medicine->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Category & Title-->

                                        <h5 class="card-title mb-1">
                                            <strong>
                                                <a href="{{route('frontend.medicine.detail',['id'=>$medicine->id])}}" class="dark-grey-text">{{$medicine->name}}</a>
                                            </strong>
                                        </h5>
                                        <span class="badge badge-danger mb-2">{{$medicine->pharmacy->name}}</span>
                                        <!-- Rating -->
                                        <ul class="rating">
                                            <li>
                                                <i class="fas fa-star blue-text"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star blue-text"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star blue-text"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star blue-text"></i>
                                            </li>
                                        </ul>

                                        <!--Card footer-->
                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                @if(Auth::check())
                                            <span class="float-left" style="margin-top: 15px">
                                                <strong>{{$medicine->price}}Rwf</strong>
                                            </span>
                                                <span style="width: 20px"></span>
                                                <span class="float-right" >

                                                        <button type="button" data-image="{{$medicine->image}}" data-pharmacy="{{$medicine->pharmacy_id}}"
                                                                data-product="{{$medicine->id}}" data-size="{{$medicine->quantity}}" data-price="{{$medicine->price}}" data-name="{{$medicine->name}}" data-display="{{$medicine->name}}"
                                                                class="add-to-cart btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                                </span>
                                                    @else
                                                    <span class="float-left" >
                                                <strong>{{$medicine->price}}Rwf</strong>
                                            </span>
                                                    <span style="width: 150px"></span>
                                                    <span class="float-right" >
                                                    <a class="" href="{{url('/login')}}" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="fas fa-shopping-cart ml-3"></i>
                                                    </a>
                                                    </span>
                                                    @endif

                                            </div>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>
                            <!--Grid column-->

                        @endforeach


                    </div>
                    <!--Grid row-->



                    <!--Grid row-->
                    <div class="row justify-content-center mb-4">

                        <!--Pagination -->
                        <nav class="mb-4">
                            {{ $medicines->links() }}
                        </nav>
                        <!--/Pagination -->

                    </div>
                    <!--Grid row-->
                </section>
                <!-- /.Products Grid -->

            </div>
            <!-- /.Content -->

        </div>
    </div>

@endsection
@section('js')

    <script type="text/javascript">
        // $(document).ready(function () {
        var latlon=[];
        var latlng;

        x = navigator.geolocation;
        x.getCurrentPosition(success, failure);

        function success(position) {
            var mylat1 = position.coords.latitude;
            var mylong1 = position.coords.longitude;
            $('#latitude').val(mylat1);
            $('#longitude').val(mylong1);
            console.log(mylong1)
            console.log(mylat1)
        }

        function failure() {
            $('#body').append('<p>it doesnt work</p>');
        }



    </script>
    {{--    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDizvdHsyM7_maiRmbLlFn_aUEnXovHnOM&callback=initMap">--}}
    {{--    </script>--}}
@endsection
