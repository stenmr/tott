<?php $icons = new Feather\Icons; ?>
<head>
<link rel="stylesheet" type="text/css" href="../assets/css/cart.css">
<script src="../assets/js/finalShoppingCart.js" async defer></script>

</head>
<body>
<section class="items_basket">
    <div class="item">
        <div class="name item_part">Porgand</div>
        <div class="quantity item_part">2 kg</div>
        <div class="full-price item_part">2.50 €</div>
        <div class="delete button item_part"><?php $icons->get('trash-2');?></div>
    </div>
    <div class="item">
        <div class="name item_part">Õun</div>
        <div class="quantity item_part">1.5 kg</div>
        <div class="full-price item_part">2.60 €</div>
        <div class="delete button item_part"><?php $icons->get('trash-2');?></div>
    </div>
    <div class="item">
        <div class="name item_part">Kartul</div>
        <div class="quantity item_part">2 kg</div>
        <div class="full-price item_part">1.50 €</div>
        <div class="delete button item_part"><?php $icons->get('trash-2');?></div>
    </div>
</section>
<section class="finalcart">
    <div class="total-price">Summa kokku</div>
    <div class="submit_button">
    <a href="/maksma" class="submit_link">
        <button>Maksma</button>
    </a>
</section>
</div>
