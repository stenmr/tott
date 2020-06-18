<?php $icons = new Feather\Icons;?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
</head>
<nav>
    <a href="/"><img src="../assets/logo.png" alt="Logo" class="logo navlink"></a>
    <a href="/" class="navlink">
        <h1>TLÜ OTT</h1>
    </a>
    <a href="/ostukorv" class="basket">
        Ostukorv
    </a>

    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        if (in_array($_SESSION['email'], $farmers )) {
            echo '<a href="/talu" class="my-account">Minu talu</a>';
        } else {
            echo '<a href="/konto" class="my-account">Minu konto</a>';
        }
        
        echo '<button class="logout">Logi välja</button>';
    } else {
        echo '<div class="g-signin2" data-width="240" data-height="50" data-longtitle="true" data-onsuccess="onSuccess" data-onfailure="onFailure"></div>';
    }
    ?>
</nav>