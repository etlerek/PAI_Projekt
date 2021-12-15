<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <title>WHATODO</title>
</head>

<body>
    <div class="container">
        <main>
            <header>
                <img src="/public/imgs/logo3.svg">
                <div class="search_bar">
                    <input placeholder="Do jakiego miasta sie wybierasz?">
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
                        <h3>Liczba pinów: <?= $city->getPinsNumber() ?></h3>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>