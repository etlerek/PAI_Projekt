<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_left_bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/style_best_places.css">
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <script src="./public/js/search.js" defer></script>
    <title>Best Places</title>
</head>

<body>

    <div class="container">
        <div class="left_bar">
            <img class = "logo" src="/public/imgs/logo3.svg">
            <input name = "search" type="text" placeholder="wyszukaj miasto">
            <button class = "best_places">najwyżej oceniane > </button>
            <button class = "find_route">wyznacz trasę > </button>
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