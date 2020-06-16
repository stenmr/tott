<head>
   <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
   <script src="../assets/js/amount.js" async defer></script>
</head>

<div class="product-card">
    <img src="https://via.placeholder.com/600x400.jpg" alt="pilt">
    <h3><?php echo $name ?></h3>
    <div class="price"><?php echo $price ?></div>
    <div class="amount-container">
        <button class="minus">
            <?php $icons->get('minus');?>
        </button>
        <input type="text" class="amount" value="1" min="1" step="1">
        <button class="plus">
            <?php $icons->get('plus');?>
        </button>
    </div>
    <div class="add-to-cart">
        <?php $icons->get('shopping-cart');?>
    </div>
</div>