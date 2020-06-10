<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
   Flight::render("home.php");
});

Flight::start()
?>
