<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/account.css">
</head>
<body>
    <div class="account_container">
        <aside class="menu_box">
            <a href="/talu/minu_kontakt"><div class="menu">Kontaktandmed</div></a>
            <a href="/talu/minu_tooted"><div class="menu">Minu tooted</div></a>
            <a href="/talu/minu_tellimused"><div class="menu">Tellimused</div></a>
            <a href="/talu/lisa"><div class="menu">Lisa tooteid</div></a>
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