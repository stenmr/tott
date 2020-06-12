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

Flight::route('/konto', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("account.php");
    Flight::render("footer.php");
});

Flight::route('/konto/minu_tooted', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("myproducts.php");
    Flight::render("footer.php");
});



Flight::start()
?>