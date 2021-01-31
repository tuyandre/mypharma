@extends('frontend.master')

@section('content')
    <br>
    <br>
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="{{asset('frontend/img/slide-one.jpg')}}" alt="First slide" style="height: 350px !important;">
                    <div class="mask">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10 list-unstyled">
                                <li>
                                    <p class="h1 red-text mb-4 mt-5">
                                        <strong>Sale off 30% on every saturday!</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-weight-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                                </li>
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" class="btn btn-danger btn-rounded" rel="nofollow">See more!</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item h-100">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="{{asset('frontend/img/slide-two.jpg')}}" alt="Second slide" style="height: 350px !important;">
                    <div class="mask">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10 list-unstyled">
                                <li>
                                    <p class="h1 dark-grey-text mb-4">
                                        <strong>Nemo enim ipsam voluptatem quia voluptas sit</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-weight-bold mb-5">Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</h5>
                                </li>
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-primary btn-rounded" rel="nofollow">Read more</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="{{asset('frontend/img/slide-three.jpg')}}" alt="Third slide" style="height: 350px !important;">
                    <div class="mask">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-md-10 text-center text-md-right list-unstyled">
                                <li>
                                    <p class="h1 blue-text mb-4 mt-5 pr-lg-5">
                                        <strong>Sale off 20% on every headphones!</strong>
                                    </p>
                                </li>
                                <li>
                                    <h5 class="h5-responsive dark-grey-text font-weight-bold mb-5 pr-lg-5">Tempora incidunt ut labore et dolore veritatis et quasi</h5>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->



    <!-- Mega menu -->
    <div class="container-fluid mx-0 px-0">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">
            <div class="container">

                <!-- Navbar brand -->
                <a class="font-weight-bold white-text mr-4" href="#">Latest Medecines</a>

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
                        $medicines=\App\Medecine::with(['Pharmacy'])->paginate(6);


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
                                            <span class="float-left">
                                                <strong>{{$medicine->price}}Rwf</strong>
                                            </span>
                                            <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                    <i class="fas fa-shopping-cart ml-3"></i>
                                                </a>
                                            </span>
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
