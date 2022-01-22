<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <script src="https://kit.fontawesome.com/aae19cf5aa.js" crossorigin="anonymous"></script>
    <title>WHATODO: MAP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans"
        rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <script src="./public/js/buttonsHandler.js" crossorigin="anonymous" defer></script>
    <script type = text/javascript src="./public/js/map.js" crossorigin="anonymous" defer></script>


    <link
        href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="/public/css/style_left_bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_map.css">
</head>
<body>
    <div class="container">
        <div class="left_bar">
            <img class = "logo" src="/public/imgs/logo3.svg">
            <input name = "search" type="text" placeholder= "wyszukaj miasto">
            <button class = "best_places">najwyżej oceniane <i class="fas fa-chevron-right"></i> </button>
            <button class = "find_route">wyznacz trasę <i class="fas fa-chevron-right"></i> </button>
            <p> Aktywne filtry </p>
            <div class = "filters">
                <button><div class = "color1"></div>zabytek</button>
                <button><div class = "color2">kultura</button>
                <button><div class = "color3">rekreacja</button>
                <button><div class = "color4">sztuka</button>
                <button><div class = "color5">romantyczne</button>
                <button><div class = "color6">jedzenie</button>
                <button><div class = "color7">pamiatki</button>
                <button><div class = "color8">bar</button>
            </div>
            <div class = "bottom_buttons">
                <button class = "back"><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <div id="map"></div>
            <div class = "map_buttons">
                <button class = "profile" > profile </button>
                <button class = "pin_plus" type="button" onclick="showPinPlus()"> <i class="fas fa-plus fa-3x"> </i> </button>
                <form id = "addPinForm" action = "map" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name = "x" type="text" placeholder="x">
                    <input name = "y" type="text" placeholder="y">
                    <input name = "title" type="text" placeholder="tytuł">
                    <input name = "address" type="text" placeholder="adres">
                    <textarea name = "description" rows = "5" cols = "35" placeholder="opis"></textarea>
                    <input name = "file" type="file">

                    <button class="button-1" type="submit">zatwierdz</button>
                    <button class="back" type="button" onclick="showPinPlus()">wstecz</button>
                </form>
            </div>
        <button class = "more"> <i class="fas fa-sliders-h fa-3x"></i> </button>
    </div>


</body>
</html>