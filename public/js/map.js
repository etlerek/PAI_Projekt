
mapboxgl.accessToken = 'pk.eyJ1IjoiZXRsZXJlayIsImEiOiJja3ZrYm82aWcwY3FwMm91Z3RwNmpsZnRlIn0.JG6BWrbAXH-2dPS7AdKZNA';
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [19.9, 50.07],
    zoom: 13
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