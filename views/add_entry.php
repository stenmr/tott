<div class="entry-container">
    <p><?php $name ?></p>
    <p><?php $price ?></p>
    <p><?php $unit ?></p>

    <?php 
    if($unit == 1){
        echo $name . " " .$price . " " . "€/kg";
    }
    if($unit == 0){
        echo $name . " " .$price . " " . "€/tk";
    }  
    ?>

</div>