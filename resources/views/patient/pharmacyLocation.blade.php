@extends('frontend.master')

@section('content')
    <br>
    <br>
    <div class="container mt-5 pt-3">

        <!--Section: Product detail -->
        <section id="productDetails" class="pb-5">
            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5" id="pharmacyMap" style="height: 100vh">


                </div>
            </div>
        </section>
    </div>


@endsection
@section('js')

    <script type="text/javascript">
        // $(document).ready(function () {
        var latlon=[];
        var latlng;
        var latitude,longitude;

        x = navigator.geolocation;
        x.getCurrentPosition(success, failure);

        function success(position) {
            var mylat1 = position.coords.latitude;
            var mylong1 = position.coords.longitude;
            window.latitude=mylat1;
            window.longitude=mylong1;
            $('#latitude').val(mylat1);
            $('#longitude').val(mylong1);
            console.log(longitude)
            console.log(mylat1)
        }

        function failure() {
            $('#body').append('<p>it doesnt work</p>');
        }

        function initMap() {
            var test = '<?php echo $pharmacy; ?>';
            // test = new Array(test);
            var myJSONString = test,
                myObject = JSON.parse(myJSONString);
            const uluru = { lat: myObject.latitude, lng: myObject.longitude };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("pharmacyMap"), {
                zoom: 15,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }

    </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDizvdHsyM7_maiRmbLlFn_aUEnXovHnOM&callback=initMap">
        </script>
@endsection
