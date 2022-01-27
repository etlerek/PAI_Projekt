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
            <a href="http://localhost:8080/home">
            <img class = "logo" src="/public/imgs/logo3.svg">
            </a>
            <input name = "search" type="text" placeholder= "wyszukaj miasto">
            <form id="button_form" action = "best_places" method="POST">
                <button class = "best_places">najwyżej oceniane </i> </button>
            </form>
<!--            <button class = "find_route">wyznacz trasę <i class="fas fa-chevron-right"></i> </button>-->
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
                <button class = "back" type="button"><i class="fas fa-chevron-left fa-3x"></i></button>
                <button class = "options" type="button"><i class="fas fa-cog fa-3x"></i></button>
            </div>
        </div>
        <pre id="info"></pre>
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
                    <div class = add_pin_buttons>
                        <button class="button-1" type="submit"><i class="fas fa-check fa-3x"></i></button>
                        <button class="back" type="button" onclick="showPinPlus()"><i class="fas fa-times fa-3x"></i></button>
                    </div>

                </form>
            </div>
        <button class = "more"> <i class="fas fa-sliders-h fa-3x"></i> </button>
    </div>


</body>
</html>