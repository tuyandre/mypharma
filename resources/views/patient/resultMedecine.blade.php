@extends('frontend.master')

@section('content')


    <!-- Mega menu -->
    <div class="container-fluid mx-0 px-0">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">
            <div class="container">

                <!-- Navbar brand -->
                <a class="font-weight-bold white-text mr-4" href="#">Search Result Medecines</a>

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


                <!-- Grid row -->
                    <div class="row">
                        @if($medicines->isEmpty())

                            <div class="col-lg-12 col-md-12 mb-4">
                                <h3 class="red-text">Result Empty , No Nearest Pharmacist Available</h3>
                            </div>

                        @else
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
                                        <span class="badge badge-danger mb-2">{{$medicine->pharmacy_name}}</span>
                                        <!-- Rating -->
                                        <ul class="rating">
                                            <li>
                                                <span>Distance:</span>
                                            </li>
                                            <li>
                                                <span class="blue-text">{{(number_format((float)($medicine->distance * 1.609344) , 2, '.', ''))}} Km</span>
                                            </li>

                                        </ul>

                                        <!--Card footer-->
                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                @if(Auth::check())
                                            <span class="float-left" style="margin-top: 15px">
                                                <strong style="margin-right: 30px"><span class="blue-text"> Price:</span>{{$medicine->price}}Rwf</strong>
                                                <strong><span class="blue-text">Available:</span>{{$medicine->quantity}}</strong>
                                            </span>
                                                <span style="width: 20px"></span>
                                                <span class="float-right">

                                                        <button type="button" data-image="{{$medicine->image}}" data-pharmacy="{{$medicine->pharmacy_id}}"
                                                                data-product="{{$medicine->id}}" data-size="{{$medicine->quantity}}" data-price="{{$medicine->price}}" data-name="{{$medicine->name}}" data-display="{{$medicine->name}}"
                                                                class="add-to-cart btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                                </span>
                                                    @else
                                                    <span class="float-left" >
                                                <strong style="margin-right: 30px"><span class="blue-text"> Price:</span>{{$medicine->price}}Rwf</strong>
                                                <strong><span class="blue-text">Available:</span>{{$medicine->quantity}}</strong>
                                            </span>
                                                    <span style="width: 20px"></span>
                                                    <span class="float-right">
                                                <a class="" href="{{url('/login')}}" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                    <i class="fas fa-shopping-cart ml-3"></i>
                                                </a>
                                                    </span>
                                                    @endif

                                            </div>

                                        </div>
                                        <div class="card-footer pb-0">
                                            <div class="row mb-0" style="text-align: center">
                                                <a href="{{route('frontend.pharmacy.location',['pharmacy'=>$medicine->pharmacy_id])}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Trace Pharmacy Location">
                                                    Trace Pharmacy Location
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>
                            <!--Grid column-->

                        @endforeach
                            @endif

                    </div>
                    <!--Grid row-->



                </section>
                <!-- /.Products Grid -->

            </div>
            <!-- /.Content -->

        </div>
    </div>

@endsection
