<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
    echo 'tott!!!!';
});

Flight::start();
