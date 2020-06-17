<?php
$typeText;
if ($type == 1) {
    $typeText = " €/kg";
}
if ($type == 0) {
    $typeText = " €/tk";
}
?>

<div class="product-card">
    <img src="https://via.placeholder.com/600x400.jpg" width="300" height="200" alt="pilt">
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
        <option value="-1" selected>Juhuslik talu</option>
        <?php
        $values = $farms;

        foreach ($farms as $product_id => $farm) {
            if ($product_id == $id) {
                foreach ($farm as $item) {
                    echo '<option value="' . $item->talu_toote_id . '">' . $item->nimi . '</option>';
                }
                break;
            }
        }
        ?>
    </select>
    <button class="add-to-cart" data-id="<?php echo $id ?>">
        <?php $icons->get('shopping-cart');?>
    </button>
</div>