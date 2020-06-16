<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
    <div class="products-and-categories-container">
        <aside class="category_box">
            <a class="category" href="/Piimatooted+ja+munad">Piimatooted ja munad</a>
            <a class="category" href="/Puuviljad">Puuviljad</a>
            <a class="category" href="/Küpsetised">Küpsetised</a>
            <a class="category" href="/Juurviljad+ja+köögiviljad">Juurviljad ja köögiviljad</a>
            <a class="category" href="/Hoidised">Hoidised</a>
            <a class="category" href="/Marjad">Marjad</a>
            <a class="category" href="/Joogid">Joogid</a>
            <a class="category" href="/Seemned+ja+teraviljad">Seemned ja teraviljad</a>
            <a class="category" href="/Liha+ja+kala">Liha ja kala</a>
        </aside>

        <div class="products">
        <?php
        foreach ($cards as $card) {
            $name = $card->nimi;
            $price = $card->hind;
            $id = $card->toote_id;
            $type = $card->yhik_kg_mitte_tk;
            include 'card.php';
        }
        ?>
        </div>
    </div>
</body>