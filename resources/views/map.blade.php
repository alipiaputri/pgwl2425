@extends('layout.template')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
    #map {
        width: 100%;
        height: calc(100vh - 56px);
    }
    </style>
@endsection

    @section('content')
    <div id="map"></div>
    @endsection


    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
    map = L.map('map').setView([-7.775159516967656, 110.37377687198457], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // FeatureGroup is to store editable layers
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            draw:{
                circle: false,
                circlemarker: false,
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function (event) {
        var layer = event.layer;

        drawnItems.addLayer(layer);
        console.log(map);
    });
    </script>


@endsection
