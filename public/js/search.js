const search = document.querySelector('input[placeholder="wyszukaj miejsce"]');
const pinsContainer = document.querySelector(".places");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const tags = [...document.querySelectorAll('.filters input')]
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.id);
        console.log(tags);

        const data = {search: this.value, tags};

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
    address.innerHTML = pin.address;
    const desc = clone.querySelector(".descryption");
    desc.innerHTML = pin.descryption;
    const tag = clone.querySelector(".tag");
    tag.innerHTML = pin.tag;

    pinsContainer.appendChild(clone);
}