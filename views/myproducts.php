<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/account.css">
</head>
<body>
    <div class="account_container">
        <aside class="menu_box">
            <a href="/talu/minu_kontakt"><div class="menu">Kontaktandmed</div></a>
            <a href="/talu/minu_tooted"><div class="menu">Minu tooted</div></a>
            <a href="/talu/minu_tellimused"><div class="menu">Tellimused</div></a>
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
                <button type="submit">Salvesta</button> 
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
                <button type="submit">Salvesta</button> 
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
                <button type="submit">Salvesta</button>   
            </div>
        </div>
    </div>


</body>