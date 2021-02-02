@extends('frontend.master')

@section('content')
    <br>
    <br>


    <div class="container mt-5 pt-3">

        <!--Section: Product detail -->
        <section id="productDetails" class="pb-5">

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                            <!--Slides-->
                            <div class="carousel-inner text-center text-md-left" role="listbox">
                                <div class="carousel-item active">
                                    <img src="{{asset('/backend/medecines/'.$medicine->image)}}" alt="First slide" class="img-fluid">
                                </div>

                            </div>
                            <!--/.Slides-->



                        </div>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                            <strong>{{Auth::user()->name}}</strong>
                        </h2>
                        <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">{{Auth::user()->email}}</span>
                        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                <strong>{{Auth::user()->phone_no}}</strong>
              </span>

                        </h3>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Product detail -->

    </div>
    <!-- /.Main Container -->

@endsection
