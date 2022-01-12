<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <title>WHATODO</title>
</head>

<body>
    <div class="container">
        <main>
            <header>
                <img src="/public/imgs/logo3.svg">
                <div class="search_bar">
                    <input placeholder="Wybierz miasto">
                </div>
                <div class="user_profile">
                    <button>profie</button>
                </div>
            </header>
            <section class="cities">
                <?php foreach($cities as $city): ?>
                    <div class="city">
                        <img src="<?= $city->getImageUrl() ?>">
                        <h2><?= $city->getName() ?></h2>
                        <p>Liczba pinów: <?= $city->getPinsNumber() ?></p>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>