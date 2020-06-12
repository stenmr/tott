<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
    // Head tuleb alati laadida esimesena, ülejäänud soovitud renderdamise järjekorras
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("home.php");
    Flight::render("footer.php");
});

Flight::route('/add', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("add.php");
    Flight::render("footer.php");
});

Flight::route('/add/new', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("addnew.php");
    Flight::render("footer.php");
});

Flight::route('/faq', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("faq.php");
    Flight::render("footer.php");
});

Flight::route('/privacy', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("privacy.php");
    Flight::render("footer.php");
});

Flight::start()
?>