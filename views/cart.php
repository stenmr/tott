<?php $icons = new Feather\Icons; ?>
<head>
<link rel="stylesheet" type="text/css" href="../assets/css/cart.css">
</head>
<body>
<div class="shopping cart">
    <div class="item">
        <div class="name">Porgand</div>
        <div class="quantity">2 kg</div>
        <div class="full-price">2.50 €</div>
        <div class="delete button"><?php $icons->get('trash-2');?></div>
    </div>
    <div class="item">
        <div class="name">Õun</div>
        <div class="quantity">1.5 kg</div>
        <div class="full-price">2.60 €</div>
        <div class="delete button"><?php $icons->get('trash-2');?></div>
    </div>
    <div class="item">
        <div class="name">Kartul</div>
        <div class="quantity">2 kg</div>
        <div class="full-price">1.50 €</div>
        <div class="delete button"><?php $icons->get('trash-2');?></div>
    </div>
</div>
<div class="finalcart">
    <div class="total-price">Summa kokku</div>
    <a href="/maksma"><input type="submit" value="Esita tellimus" class="button submit_order"></a>
</div>
