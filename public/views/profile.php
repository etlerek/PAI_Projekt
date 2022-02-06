<!DOCTYPE html>

<html lang="pl">

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_profile.css">
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
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
                <div class = "right_side">
                    <p id = "nick"><?= $data->nickname ?> </p>
                    <img id="profilePic" src = "/public/uploads/image0.png">
                </div>
                <div class = "left_side">
                    <h1>Informacje personalne:</h1>
                    <p>IMIE: <?= $data->name ?> </p>
                    <p>NAZWISKO: <?= $data->surname ?> </p>
                    <p>email: <?= $data->email ?></p>
                </div>
                <form id="logout" action = "login" method="POST">
                    <button name = 'logout'>Wyloguj się!</i></button>
                </form>
            </section>
            <div class = "right_side">
                <h2>Piny użytkownika</h2>
                <section class="places">
                    <?php foreach($pins as $place): ?>
                        <div class="place">
                            <img src="public/uploads/<?= $place->getImageUrl() ?>">
                            <div class="name"><?= $place->getName() ?></div>
                            <div class="address"><?= $place->getAddress()?></div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
    </main>
</div>
</body>