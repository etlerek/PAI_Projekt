<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_left_bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/style_best_places.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <script src="./public/js/search.js" defer></script>
    <script src="./public/js/filter.js" defer></script>
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
            <div class = "filters" id = "filters">
                <?php foreach($tags as $tag): ?>
                    <div class = "checkbox">
                        <input type="checkbox" class = "radio" id="<?= $tag -> getName(); ?>" name="tag">
                        <span class="checkmark"><?= $tag->getName()?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class = "bottom_buttons">
                <button class = "back"><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <section class="places">
            <?php foreach($pins as $pin): ?>
                <div id = "place" class="place">
                    <a href = "http://localhost:8080/map">
                        <img src="public/uploads/<?= $pin->getImageUrl() ?>">
                    </a>
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