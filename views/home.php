<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
    <div class="products-and-categories-container">
        <aside class="category_box">
            <div class="category">Piimatooted ja munad</div>
            <div class="category">Puuviljad</div>
            <div class="category">Küpsetised</div>
            <div class="category">Juurviljad ja köögiviljad</div>
            <div class="category">Hoidised</div>
            <div class="category">Marjad</div>
            <div class="category">Joogid</div>
            <div class="category">Seemned ja teraviljad</div>
            <div class="category">Liha ja kala</div>
        </aside>

        <div class="products">
        <?php
        foreach ($cards as $card) {
            $name = $card->name;
            $price = $card->price;
            include 'card.php'; 
        }
        ?>
        </div>
    </div>
</body>