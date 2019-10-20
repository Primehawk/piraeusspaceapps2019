@extends('layout.default')
@section('content')
    <div class="content-box">
        <div class="content-box-title">
            <span><h3><i class="fas fa-user-friends"></i>Global Nodes Map</h3></span>
        </div>
        <div class="content-box-content">
            <div id='map' style="width: 100%; height: 30rem;"></div>
        </div>
    </div>
@stop

@section('endofpage')

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet'/>

    <script type="text/javascript">
        jQuery(document).ready(function () {

            // Start of Global Gateways Map
            mapboxgl.accessToken = '{{ env("MapBoxApiKey")  }}';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [23.673831  , 37.978557],
                zoom: 10
            });
            // Add zoom and rotation controls to the map.
            map.addControl(new mapboxgl.NavigationControl());


            map.on('load', function() {
                map.addSource('clusters', {
                        type: "geojson",
                        cluster: true,
                        data: {
                            "type": "FeatureCollection",
                            "features": [
                                @foreach ($_Nodes as $_Node)
                                {
                                    "type": "Feature",
                                    "geometry": {
                                        "type": "Point",
                                        "coordinates": [{{ $_Node->longitude }}, {{ $_Node->latitude }}]
                                    },
                                    "properties": {
                                        "id": "{{ $_Node->id }}",
                                        "aqi": "{{ $_Node->aqi }}"
                                    }
                                },
                                @endforeach

                                ]
                        }
                    }
                );

                // Todo use step color

                map.addLayer({
                    "id": "clusters",
                    "type": "circle",
                    "source": "clusters",
                    "paint": {
                        "circle-radius": 18,
                        "circle-color": "#00ff71",
                    }
                });

                map.addLayer({
                    "id": "clusters-label",
                    "type": "symbol",
                    "source": "clusters",
                    "layout": {
                        "text-field": "test",
                        "text-font": [
                            "DIN Offc Pro Medium",
                            "Arial Unicode MS Bold"
                        ],
                        "text-size": 12
                    }
                });
            });


            // var marker = new mapboxgl.Marker({
            //     draggable: true
            // }).setLngLat([, ])
            //     .addTo(map);

            //  function onDragEnd() {
            //      var lngLat = marker.getLngLat();
            //       jQuery("#latitude").val(lngLat.lat);
            //       jQuery("#Longitude").val(lngLat.lng);
            //    }
            // marker.on('dragend', onDragEnd);

            // End of Global Gateways Map

        });
    </script>
@stop
