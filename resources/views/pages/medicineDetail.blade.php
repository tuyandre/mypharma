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
                            <strong>{{$medicine->name}}</strong>
                        </h2>
                        <span class="badge badge-danger product mb-4 ml-xl-0 ml-4">{{$medicine->pharmacy->name}}</span>
                        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                <strong>{{$medicine->price}} Rwf</strong>
              </span>

                        </h3>

                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                            <!-- Accordion card -->
                            <div class="card">

                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                        <h5 class="mb-0">
                                            Description
                                            <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                    <div class="card-body">
                                        {{$medicine->description}}
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion card -->
                        </div>
                        <!--/.Accordion wrapper-->

                        <!-- Add to Cart -->
                        <section class="color">
                            <div class="mt-5">

                                <div class="row mt-3 mb-4">
                                    <div class="col-md-12 text-center text-md-left text-md-right">
                                        <button class="btn btn-primary btn-rounded">
                                            <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /.Add to Cart -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Product detail -->

    </div>
    <!-- /.Main Container -->

@endsection
