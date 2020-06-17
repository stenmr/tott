<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/account.css">
</head>
<body>
    <div class="account_container">
        <aside class="menu_box">
            <a href="/talu/minu_kontakt">Kontaktandmed</a>
            <a href="/talu/minu_tooted">Minu tooted</a>
            <a href="/talu/minu_tellimused">Tellimused</a>
            <a href="/talu/lisa">Lisa tooteid</a>
        </aside>
        

        <div class="products">
        <?php
        foreach ($myproducts as $card) {
            $name = $card->nimi;
            $price = $card->hind;
            $type = $card->yhik_kg_mitte_tk;
            include 'mycard.php';
        }
        ?>
        </div>
    </div>


</body>