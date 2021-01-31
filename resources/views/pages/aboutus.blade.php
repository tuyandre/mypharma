@extends('frontend.master')

@section('content')

    <!-- about section -->
    <section class="about text-center" id="about">
        <div class="container">
            <div class="row">
                <h2>about us</h2>
                <h4>we are the group of three students from computer science department year4,acadimic calendar 2019-2020</h4>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail clearfix">
                        <div class="about-img">
                            <img class="img-responsive" src="{{asset('/frontend/img/etienne1.jpg')}}" alt="" style="height: 350px!important;">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>N</h1>
                            </div>
                            <h3>NTANDIBINYANGE Etienne</h3>
                            <p> I'm the one of the member of this group in charge of coding and collect some requirements .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="{{asset('/frontend/img/sarah.jpg')}}" alt="" style="height: 350px!important;">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>U</h1>
                            </div>

                            <h3>UWIMBABAZI Sarah</h3>
                            <p>I'm the one of member of this group in charge of data collection and management.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-about-detail">
                        <div class="about-img">
                            <img class="img-responsive" src="{{asset('/frontend/img/beatrice.jpg')}}" alt="" style="height: 350px!important;">
                        </div>
                        <div class="about-details">
                            <div class="pentagon-text">
                                <h1>M</h1>
                            </div>
                            <h3>MUKANIYIGABA Beatrice</h3>
                            <p>I'm the one of member of this group in charge data analysis and collection of all activities done.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of about section -->


    <!-- service section starts here -->
    <section class="service text-center" id="service">
        <div class="container">
            <div class="row">
                <h2>our services</h2>
                <h4>Collaboration among patients and pharmacies by giving extracare to the patients concern with the prescription given by the doctors.</h4><br>
                <h4>And treat these problems:</h4>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="heart img-responsive" src="{{asset('/frontend/img/service1.png')}}" alt="">
                            </div>
                        </div>
                        <h3>Heart problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="brain img-responsive" src="{{asset('/frontend/img/service2.png')}}" alt="">
                            </div>
                        </div>
                        <h3>brain problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="knee img-responsive" src="{{asset('/frontend/img/service3.png')}}" alt="">
                            </div>
                        </div>
                        <h3>knee problem</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service">
                        <div class="single-service-img">
                            <div class="service-img">
                                <img class="bone img-responsive" src="{{asset('/frontend/img/service4.png')}}" alt="">
                            </div>
                        </div>
                        <h3>human bones problem</h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of service section -->


@endsection
