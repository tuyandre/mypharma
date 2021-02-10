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

    <script >
            function  initMap(){
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const myloc= { lat: position.coords.latitude, lng: position.coords.longitude };
                        console.log(myloc);
                        var test = '<?php echo $pharmacy; ?>';
                        // test = new Array(test);
                        var myJSONString = test,
                            myObject = JSON.parse(myJSONString);
                        console.log(myObject.name);
                        var locations = [
                            ['My Location', position.coords.latitude, position.coords.longitude, 2],
                            [myObject.name, myObject.latitude, myObject.longitude, 1]
                        ];

                        var map = new google.maps.Map(document.getElementById('pharmacyMap'), {
                            zoom: 14,
                            center: myloc,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i;

                        for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });

                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infowindow.setContent(locations[i][0]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }

                    });
                }
            }


    </script>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDizvdHsyM7_maiRmbLlFn_aUEnXovHnOM&callback=initMap">
        </script>
@endsection
