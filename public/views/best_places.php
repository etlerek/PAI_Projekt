<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_best_places.css">
    <link rel="stylesheet" type="text/css" href="public/css/style_left_bar.css">
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <script src="./public/js/search.js" defer></script>
    <title>Best Places</title>
</head>

<body>

    <div class="container">
        <div class="left_bar">
            <a href="http://localhost:8080/home">
                <img class = "logo" src="/public/imgs/logo3.svg">
            </a>
            <input name = "search" type="text" placeholder="wyszukaj miejsce">
            <form id="button_form" action="map" method = "POST">
                <button class = "best_places">mapa</button>
            </form>
            <p> Aktywne filtry </p>
            <div class = "filters">
                <div class = "checkbox">
                    <input type="checkbox" id="zabytek" value="coding">
                    <span class="checkmark">zabytek</span>
                </div>
                <div class = "checkbox">
                    <input type="checkbox" id="kultura" value="kultura">
                    <span class="checkmark">kultura</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="rekreacja" value="rekreacja">
                    <span class="checkmark">rekreacja</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="sztuka" value="sztuka">
                    <span class="checkmark">sztuka</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="romantyczne" value="romantyczne">
                    <span class="checkmark">romantyczne</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="jedzenie" value="jedzenie">
                    <span class="checkmark">jedzenie</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="pamiatki" value="pamiatki">
                    <span class="checkmark">pamiatki</span>
                </div>
                <div  class = "checkbox">
                    <input type="checkbox" id="bar" value="bar">
                    <span class="checkmark">bar</span>
                </div>
            </div>
            <div class = "bottom_buttons">
                <button class = "back"><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <section class="places">
            <?php foreach($pins as $pin): ?>
                <div id = "place" class="place">
                    <img src="public/uploads/<?= $pin->getImageUrl() ?>">
                    <div class="name"><?= $pin->getName() ?></div>
                    <div class="address"><?= $pin->getAddress()?></div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

</body>

<template id = "pin-template">
    <div  id = "place" class="place">
        <img src="">
        <div class="name">name</div>
        <div class="address">address</div>
    </div>
</template>
</html>