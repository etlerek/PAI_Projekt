
mapboxgl.accessToken = 'pk.eyJ1IjoiZXRsZXJlayIsImEiOiJja3ZrYm82aWcwY3FwMm91Z3RwNmpsZnRlIn0.JG6BWrbAXH-2dPS7AdKZNA';
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    //center: [19.9, 50.07],
    center: [-77.032, 38.913],
    zoom: 7
});

fetch("/places").then(function (response) {
    return response.json();
}).then(function (places) {

    places.map(place => {
        place.coordinates = JSON.parse(place.coordinates);
    })

    displayPlaces(places);
});

// add markers to map
function displayPlaces(places){
    for (const feature of places) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';
        // make a marker for each feature and add it to the map
        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `<h3>${feature.name}</h3><p>${feature.descryption}</p>`
                    )
            )
            .addTo(map);
    }
}

//test pobierania coordów
map.on('click', (e) => {
    document.getElementById('info').innerHTML =
// `e.point` is the x, y coordinates of the `mousemove` event
// relative to the top-left corner of the map.
        JSON.stringify(e.point) +
        '<br />' +
        // `e.lngLat` is the longitude, latitude geographical position of the event.
        JSON.stringify(e.lngLat.wrap());
    console.log(JSON.stringify(e.lngLat.wrap()));
});

