<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_profile.css">
    <script src="./public/js/buttonsHandler.js" crossorigin="anonymous" defer></script>
    <title>PROFILE</title>
</head>

<body>
<div class="container">
    <main>
        <header>
            <a href="http://localhost:8080/home">
                <img class = "logo" src="/public/imgs/logo3.svg">
            </a>
            <div class="home_button">
                <form action = "map" method="POST">
                    <button name = 'map'>MAPA</button>
                </form>


            </div>
        </header>
        <div class = "sections" >
            <?php
                $data = Session::getInstance();
            ?>
            <section class = "person_info">
                <p id = "nick"><?= $data->nickname ?> </p>
                <img id="profilePic" src = "/public/uploads/image0.png">
                <h1>Informacje personalne:</h1>
                <p>IMIE: <?= $data->name ?> </p>
                <p>NAZWISKO: <?= $data->surname ?> </p>
                <p>email: <?= $data->email ?></p>
                <form action = "login" method="POST">
                    <button name = 'logout'>WYLOGUJ SIĘ</button>
                </form>
            </section>
            <section class="places">
                <h1>Piny użytkownika</h1>
                <?php foreach($places as $place): ?>
                    <div class="place">
                        <img src="<?= $place->getImageUrl() ?>">
                        <div class="name"><?= $place->getName() ?></div>
                        <div class="adres"><?= $place->getAdres()?></div>
                        <div class="score">Ocena: <?= $place->getScore()?></div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>
</div>
</body>