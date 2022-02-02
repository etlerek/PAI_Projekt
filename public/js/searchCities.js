const searchCites = document.querySelector('input[placeholder="Wybierz miasto"]');
const citiesContainer = document.querySelector(".cities");

console.log(JSON.stringify("dupa"));

searchCites.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {searchCities: this.value};

        fetch("/searchCities", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(JSON.stringify(data));
            return response.json();
        }).then(function (cities) {
            citiesContainer.innerHTML = "";
            loadCities(cities)
        });
    }
});

function loadCities(cities) {
    cities.forEach(city => {
        console.log(city);
        createCity(city);
    });
}

function createCity(city){
    const template = document.querySelector("#citiesTemplate");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `./public/uploads/${city.img}`;
    const name = clone.querySelector("h2");
    name.innerHTML = city.name;

    citiesContainer.appendChild(clone);
}