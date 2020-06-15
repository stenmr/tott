<div class="product-card">
    <img src="https://via.placeholder.com/600x400.jpg" alt="pilt">
    <h3><?php echo $name ?></h3>
    <div class="price"><?php echo $price ?></div>
    <div class="amount-container">
        <div class="minus">
            <?php $icons->get('minus');?>
        </div>
        <input type="text" class="amount" value="0" min="0.5" step="0.5">
        <div class="plus">
            <?php $icons->get('plus');?>
        </div>
    </div>
    <div class="add-to-cart">
        <?php $icons->get('shopping-cart');?>
    </div>
</div>