<?php $icons = new Feather\Icons; ?>
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
        <div class="product-card">
            <img src="https://via.placeholder.com/150.png" alt="pilt">
            <h3>Kartulid</h3>
            <h3>Kartulid</h3>
            <div class="price">Siia tuleb hind</div>
            <div class="amount-container">
                <div class="minus">
                    <?php $icons->get('minus');?>
                </div>
                <input type="text" id="amount" class="amount" value="0" min="0.5" step="0.5">
                <div class="plus">
                    <?php $icons->get('plus');?>
                </div>
            </div>
            <div class="add-to-cart" >
               Lisa ostukorvi <?php $icons->get('shopping-cart'); ?>
            </div>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/150.png" alt="pilt">
            <h3>Maasikas</h3>
            <div class="amount-container">
                <div class="minus">
                    <?php $icons->get('minus');?>
                </div>
                <output class="amount"></output>
                <div class="plus">
                    <?php $icons->get('plus');?>
                </div>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/150.png" alt="pilt">
                <h3>Tomat</h3>
                <div class="amount-container">
                    <div class="minus">
                        <?php $icons->get('minus');?>
                    </div>
                    <output class="amount"></output>
                    <div class="plus">
                        <?php $icons->get('plus');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>