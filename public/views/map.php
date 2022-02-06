<!DOCTYPE html>
<html lang="en">
<head>
    <title>WHATODO: MAP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js" defer></script>
    <script src="./public/js/buttonsHandler.js" crossorigin="anonymous" defer></script>
    <script type = text/javascript src="./public/js/map.js" crossorigin="anonymous" defer></script>
    <script type = text/javascript src="./public/js/filter.js" crossorigin="anonymous" defer></script>


    <link
        href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="/public/css/style_left_bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_map.css">
    <?php
        $data = Session::getInstance();
    ?>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
    <div class="container">
        <div id = "left_bar" class="left_bar">
            <a href="http://localhost:8080/home">
                <img class = "logo" src="/public/imgs/logo3.svg">
            </a>
            <div id="geocoder" class="geocoder"></div>
<!--            <input id = "searchMap" name = "search" type="text" placeholder= "wyszukaj miasto">-->
            <form id="button_form" action = "best_places" method="POST">
                <button class = "best_places">najwyżej oceniane </i> </button>
            </form>
<!--            <button class = "find_route">wyznacz trasę <i class="fas fa-chevron-right"></i> </button>-->
            <p> Aktywne filtry </p>
            <div class = "filters">
                <?php foreach($tags as $tag): ?>
                    <div class = "checkbox">
                        <input type="checkbox" id="<?= $tag->getName()?>" value="<?= $tag->getName()?>" onclick="clickCheckbox()">
                        <span class="checkmark"><?= $tag->getName()?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class = "bottom_buttons">
                <button class = "back" type="button" onclick='showLeftBar()'><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options" type="button"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <pre id="info"></pre>
        <div id="map"></div>
            <div class = "map_buttons">
                <form id = "profile" action = "profile" method="GET" enctype="multipart/form-data">
                    <button class = "profile" ><i class="far fa-user fa-4x"></i></button>
                </form>
                <?php
                if($data)
                    if(isset($_SESSION['id']))
                        echo "<button class = 'pin_plus' type='submit' onclick='showPinPlus()'> <i class='fas fa-plus fa-3x'> </i> </button>"
                ?>
                <form id = "addPinForm" action = "map" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <h2>Wybierz miejsce dodania pinu oraz wpisz dane</h2>
                    <input id = "coordinates" name = "coordinates" type="text" placeholder="coordinates">
                    <input id = "title" name = "title" type="text" placeholder="tytuł">
                    <textarea id = "address" name = "address" rows = "2" type="text" placeholder="address"></textarea>
                    <textarea name = "description" rows = "5" cols = "35" placeholder="opis"></textarea>
<!--                    <input name = "tag" type="text" placeholder="tag">-->
                    <input list="tagAddPin" name="tagAddPin" placeholder="tag">
                    <datalist id="tagAddPin">
                    <?php foreach($tags as $tag): ?>
                        <option value="<?= $tag->getName()?>"><?= $tag->getName()?></option>
                    <?php endforeach; ?>
                    </datalist>

                    <input id = "file" name = "file" type="file">
                    <div class = add_pin_buttons>
                        <button class="button-1" type="submit" ><i class="fas fa-check fa-3x"></i></button>
                        <button class="back" type="button" onclick="showPinPlus()"><i class="fas fa-times fa-3x"></i></button>
                    </div>

                </form>
            </div>
        <button class = "more" onclick='showLeftBar()'> <i class="fas fa-sliders-h fa-3x"></i> </button>
    </div>


</body>
</html>