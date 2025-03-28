@extends('client.layouts.app')

@section('title')
    {{ __('index.location') }}
@endsection

@section('style')
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <!-- مكتبة Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endsection

@section('content')
    <body>

        <select class="form-select" name="city_id" id="city_select">
            <option selected disabled value="">Choose...</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>

        <div id="map"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            let map;
            let markers = [];

            function initMap() {
                if (!document.getElementById("map")) return;

                // إنشاء الخريطة مع تحديد نقطة افتراضية (الرياض)
                map = L.map('map').setView([24.7136, 46.6753], 8);

                // إضافة طبقة OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
            }

            $(document).ready(function () {
                initMap();

                $('#city_select').change(function () {
                    let city_id = $(this).val();
                    if (!city_id) return;

                    $.ajax({
                        url: "/get-city-data",
                        type: "GET",
                        data: { city_id: city_id },
                        success: function (locations) {
                            clearMarkers();
                            if (locations.length > 0) {
                                locations.forEach(function (location) {
                                    addMarker(location.latitude, location.longitude);
                                });
                                let firstLocation = locations[0];
                                map.setView([parseFloat(firstLocation.latitude), parseFloat(firstLocation.longitude)], 12);
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

            function addMarker(lat, lng) {
                let marker = L.marker([parseFloat(lat), parseFloat(lng)]).addTo(map);
                markers.push(marker);
            }

            function clearMarkers() {
                markers.forEach(marker => map.removeLayer(marker));
                markers = [];
            }
        </script>

    </body>
@endsection
