mapboxgl.accessToken = 'pk.eyJ1IjoiZXRsZXJlayIsImEiOiJja3ZrYm82aWcwY3FwMm91Z3RwNmpsZnRlIn0.JG6BWrbAXH-2dPS7AdKZNA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [19.9, 50.07],
    //center: [-77.032, 38.913],
    zoom: 7
});

const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl
});

document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

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
                        `<img style = height = '100%' width = '100%' margin = 0 src = 'public/uploads/${feature.img}' > <h3>${feature.name}</h3></img><p>${feature.descryption}</p><h5>tag: ${feature.tag}</h5>`
                    )
            )
            .addTo(map);
    }
}


map.on('click', (e) => {
    const data = (e.lngLat.wrap());
    document.getElementById('info').innerHTML =
        JSON.stringify(e.point) +
        '<br />' +
        JSON.stringify(e.lngLat.wrap());
    document.getElementById("coordinates").value = `[${data.lng}, ${data.lat}]`;
    mapClickFn(data);
});

function mapClickFn(coordinates) {
    const url =
        "https://api.mapbox.com/geocoding/v5/mapbox.places/" +
        coordinates.lng +
        "," +
        coordinates.lat +
        ".json?access_token=" +
        `pk.eyJ1IjoiZXRsZXJlayIsImEiOiJja3ZrYm82aWcwY3FwMm91Z3RwNmpsZnRlIn0.JG6BWrbAXH-2dPS7AdKZNA` +
        "&types=address";
    $.get(url, function (data) {
        if (data.features.length > 0) {
            if(data.features[0].address == undefined){
                const address = data.features[0].text + ", " + data.features[0].context[0].text + " " + data.features[0].context[1].text;
                console.log(address);
                document.getElementById("address").value = address;
            }
            else{
                const address = data.features[0].text + " " + data.features[0].address + ", " + data.features[0].context[0].text + " " + data.features[0].context[1].text;
                console.log(address);
                document.getElementById("address").value = address;
            }
        } else {
            document.getElementById("address").value = "Nie znaleziono adresu, proszę podać własny";
        }
    });
}
