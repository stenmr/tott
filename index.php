<?php
require 'vendor/autoload.php';

Flight::route('/', function () {
    echo 'tott!!!!';
});

Flight::start()
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLÜ OTT</title>
</head>
<body>
    <nav>
        <h1>Tott</h1>
        <a href="login">Login</a>
    </nav>

    <aside>
        <div class="category">Piimatooted ja munad</div>
        <div class="category">Puuviljad</div>
        <div class="category">Küpsetised</div>
        <div class="category">Juurviljad ja köögiviljad</div>
        <div class="category">Hoidised</div>
        <div class="category">Joogid</div>
        <div class="category">Seemned ja teraviljad</div>
        <div class="category">Marjad</div>
        <div class="category">Liha ja kala</div>
        
    </aside>

    <div class="product-card">
        <img src="https://via.placeholder.com/150.png" alt="pilt">
        <h3>Kartul</h3>
        <div class="amount-container">
            <div class="minus"></div>
            <output class="amount"></output>
            <div class="plus"></div>
        </div>
    </div>
    <div class="product-card">
        <img src="https://via.placeholder.com/150.png" alt="pilt">
        <h3>Maasikas</h3>
        <div class="amount-container">
            <div class="minus"></div>
            <output class="amount"></output>
            <div class="plus"></div>
        </div>
    </div>
    <div class="product-card">
        <img src="https://via.placeholder.com/150.png" alt="pilt">
        <h3>Tomat</h3>
        <div class="amount-container">
            <div class="minus"></div>
            <output class="amount"></output>
            <div class="plus"></div>
        </div>
    </div>
</body>
</html>