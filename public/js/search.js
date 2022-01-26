const search = document.querySelector('input[placeholder="wyszukaj miejsce"]');
const pinsContainer = document.querySelector(".places");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(JSON.stringify(data));
            return response.json();
        }).then(function (pins) {
            pinsContainer.innerHTML = "";
            loadPins(pins)
        });
    }
});

function loadPins(pins) {
    pins.forEach(pin => {
        console.log(pin);
        createPin(pin);
    });
}

function createPin(pin){
    const template = document.querySelector("#pin-template");
    const clone = template.content.cloneNode(true);

    const div = clone.querySelector(".place");
    div.id = pin.id;
    const image = clone.querySelector("img");
    image.src = `./public/uploads/${pin.img}`;
    const name = clone.querySelector(".name");
    name.innerHTML = pin.name;
    const address = clone.querySelector(".address");
    console.log(pin);
    address.innerHTML = pin.address;

    pinsContainer.appendChild(clone);
}