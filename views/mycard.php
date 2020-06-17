<?php
    $typeText;
    if($type == 1){
        $typeText =  " €/kg";
    }
    if($type == 0){
        $typeText = " €/tk";
    }  
?>

<?php
    $typeUnit;
    if($type == 1){
        $typeUnit =  "KG";
    }
    if($type == 0){
        $typeUnit = "TK";
    }  
?>

<div class="product-card">
    <img src="https://via.placeholder.com/600x400.jpg" alt="pilt">
    <h3><?php echo $name ?></h3>
    <div class="price"><?php echo $price . $typeText ?></div>
    <div class="amount-container2">
        <input type="text" class="myamount" value="1" min="1" step="1">
        <?php echo $typeUnit ?>
    </div>
    <button type="button">Salvesta muudatused</button>
</div>