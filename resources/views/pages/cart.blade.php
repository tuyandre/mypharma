@extends('frontend.cartLayout.master')
@section('title','Cart')

@section('css')

@endsection
@section('header')


@endsection

@section('content')
    {{--    <div class="site-section">--}}
<br>
<br>
<br>
    <!--Main layout-->
    <main>
        <div class="container">

            <!--Section: Block Content-->
            <section class="mt-5 mb-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-8">

                        <!-- Card -->
                        <div class="card wish-list mb-4">
                            <div class="card-body">

                                <h5 class="mb-4">Cart (<span class="total-count"></span> items)</h5>

                                <hr class="mb-4">
                                <div class="row cart-product">

                                </div>

                                <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding items to your cart does not mean booking them.</p>

                            </div>
                        </div>
                        <!-- Card -->



                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4">

                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="card-body">

                                <h5 class="mb-3">The total amount of</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Temporary amount
                                        <span>   <span class="total-cart"></span>Rwf</span>
                                    </li>
                                    {{--                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">--}}
                                    {{--                                        Shipping--}}
                                    {{--                                        <span>Gratis</span>--}}
                                    {{--                                    </li>--}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>The total amount of</strong>
                                            <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong>
                                        </div>
                                        <strong>   <span class="total-cart"></span>Rwf</strong>
                                        {{--                                        <span><strong>$53.98</strong></span>--}}
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-primary btn-block waves-effect waves-light checkout-payment">Complete Order</button>

                            </div>
                        </div>
                        <!-- Card -->


                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Block Content-->

        </div>
    </main>
    <!--Main layout-->
    {{--    </div>--}}
    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>

    </script>

@endsection
