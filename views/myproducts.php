<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/account.css">
</head>
<body>
    <div class="account_container">
        <aside class="menu_box">
            <div class="menu">Kontaktandmed</div>
            <div class="menu">Minu tooted</div>
            <div class="menu">Tellimused</div>
        </aside>
        

        <div class="products">
            <div class="product-card">
                <img src="https://via.placeholder.com/150.png" alt="pilt">
                <h3>Kartulid</h3>
                <div class="price">Siia tuleb hind</div>
                <p>Muuda kogust:</p>
                <div class="amount-container">
                    <div class="minus">
                        <?php $icons->get('minus');?>
                    </div>
                    <input type="text" id="amount" class="amount" value="0" min="0.5" step="0.5">
                    <div class="plus">
                        <?php $icons->get('plus');?>
                    </div>
                </div>   
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/150.png" alt="pilt">
                <h3>Kartulid</h3>
                <div class="price">Siia tuleb hind</div>
                <p>Muuda kogust:</p>
                <div class="amount-container">
                    <div class="minus">
                        <?php $icons->get('minus');?>
                    </div>
                    <input type="text" id="amount" class="amount" value="0" min="0.5" step="0.5">
                    <div class="plus">
                        <?php $icons->get('plus');?>
                    </div>
                </div>   
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/150.png" alt="pilt">
                <h3>Kartulid</h3>
                <div class="price">Siia tuleb hind</div>
                <p>Muuda kogust:</p>
                <div class="amount-container">
                    <div class="minus">
                        <?php $icons->get('minus');?>
                    </div>
                    <input type="text" id="amount" class="amount" value="0" min="0.5" step="0.5">
                    <div class="plus">
                        <?php $icons->get('plus');?>
                    </div>
                </div>   
            </div>
        </div>
    </div>


</body>