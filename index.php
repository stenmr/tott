<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
    // Head tuleb alati laadida esimesena, ülejäänud soovitud renderdamise järjekorras
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("home.php");
    Flight::render("footer.php");
});

Flight::start()
?>