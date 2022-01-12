<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <title>WHATODO: MAP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans"
        rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link
        href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="/public/css/style_left_bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_map.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        .marker {
            background-image: url('mapbox-icon.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .mapboxgl-popup {
            max-width: 200px;
        }
        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left_bar">
            <img class = "logo" src="/public/imgs/logo3.svg">
            <input name = "search" type="text" placeholder= "wyszukaj miasto">
            <button class = "best_places">najwyżej oceniane <i class="fas fa-chevron-right"></i> </button>
            <button class = "find_route">wyznacz trasę <i class="fas fa-chevron-right"></i> </button>
            <p> Aktywne filtry </p>
            <div class = "filters">
                <button><div class = "color"></div>zabytek</button>
                <button>kultura</button>
                <button>rekreacja</button>
                <button>sztuka</button>
                <button>romantyczne</button>
                <button>jedzenie</button>
                <button>pamiatki</button>
                <button>bar</button>
            </div>
            <div class = "bottom_buttons">
                <button class = "back"><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <div id="map"></div>
            <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiZXRsZXJlayIsImEiOiJja3ZrYmwzbDg2cWpvMzFxdzhnenVhbzVlIn0.un-kVFvpWtxiliFoYQ5p6w';

            const geojson = {
                'type': 'FeatureCollection',
                'features': [
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [-77.032, 38.913]
                        },
                        'properties': {
                            'title': 'Mapbox',
                            'description': 'Washington, D.C.'
                        }
                    },
                    {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [-122.414, 37.776]
                        },
                        'properties': {
                            'title': 'Mapbox',
                            'description': 'San Francisco, California'
                        }
                    }
                ]
            };

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: [-96, 37.8],
                zoom: 3
            });

            // add markers to map
            for (const feature of geojson.features) {
                // create a HTML element for each feature
                const el = document.createElement('div');
                el.className = 'marker';

                // make a marker for each feature and add it to the map
                new mapboxgl.Marker(el)
                    .setLngLat(feature.geometry.coordinates)
                    .setPopup(
                        new mapboxgl.Popup({ offset: 25 }) // add popups
                            .setHTML(
                                `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                            )
                    )
                    .addTo(map);
            }
        </script>
            <div class = "map_buttons">
                <button class = "pin_plus"> profile </button>
                <button class = "profile"> <i class="fas fa-plus fa-3x"> </i> </button>
            </div>
    </div>
</body>
</html>