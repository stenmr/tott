<?php
    $typeText;
    if($type == 1){
        $typeText =  " €/kg";
    }
    if($type == 0){
        $typeText = " €/tk";
    }  
?>

<div class="product-card">
    <img src="https://via.placeholder.com/600x400.jpg" alt="pilt">
    <h3><?php echo $name ?></h3>
    <div class="price"><?php echo $price . $typeText ?></div>
    <div class="amount-container">
        <button class="minus">
            <?php $icons->get('minus');?>
        </button>
        <input type="text" class="amount" value="1" min="1" step="1">
        <button class="plus">
            <?php $icons->get('plus');?>
        </button>
    </div>
    <select name="farm" class="farm-select" required>
    <option value="" selected>Juhuslik talu</option>
    </select>
    <button class="add-to-cart" data-id="<?php echo $id ?>">
        <?php $icons->get('shopping-cart');?>
    </button>
</div>