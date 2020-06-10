<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
   Flight::render("home.php");
});

Flight::start()
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>TLÜ OTT</title>
</head>