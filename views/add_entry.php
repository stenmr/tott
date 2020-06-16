<div class="entry-container">
    <p><?php $name ?></p>
    <p><?php $price ?></p>
    <p><?php $unit ?></p>

    <?php
    $unitText;
    if($unit == 1){
        $unitText = "€/kg";
    }
    if($unit == 0){
        $unitText = "€/tk";
    }  
    ?>

    <option value="<?php echo ($name . '|' . $price . '|' . $unit)?>"><?php echo ($name . ' ' . $price . ' ' . $unitText)?></option>

</div>