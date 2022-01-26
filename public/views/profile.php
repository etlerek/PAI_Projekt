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
                <button>HOME</button>
                <button>WYLOGUJ SIĘ</button>
            </div>
        </header>
        <div class = "sections" >
            <section class = "person_info">
                <h1>Informacje personalne</h1>
                <p>KSYWKA: </p>
                <p>IMIE: </p>
                <p>NAZWISKO: </p>
                <p>email: </p>
                <img src = "/public/imgs/logo3.svg">
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