<?php $icons = new Feather\Icons;?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
</head>
<nav>
    <a href="/"><img src="../assets/logo.png" alt="Logo" class="logo navlink"></a>
    <a href="/" class="navlink">
        <h1>TLÜ OTT</h1>
    </a>
    <div class="basket">
        <a href="/ostukorv">
            <?php $icons->get('shopping-cart');?>
            Ostukorv
        </a>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        echo '<a href="/konto" class="my-account">Minu konto</a>';
    } else {
        echo '<div class="g-signin2" data-width="240" data-height="50" data-longtitle="true" data-onsuccess="onSuccess" data-onfailure="onFailure"></div>';
    }
    ?>
</nav>