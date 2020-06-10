<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <title>TLÜ OTT</title>
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon"/>
</head>

<body>
    <nav>
        <img id="logo" src="../assets/logo.png" alt="Logo" class="logo">
        <h1>TLÜ OTT</h1>
		<h4>Talutoit otse tootjalt Tallinna Ülikooli</h4>
    </nav>
	
	<div class="search">
		<input type="text" id="search" maxlength="30">
	</div>
	
	<div class="login">
		<a href="login">Logi sisse</a>
	</div>

    <aside class="category_box">
        <div class="category">Piimatooted ja munad</div>
        <div class="category">Puuviljad</div>
        <div class="category">Küpsetised</div>
        <div class="category">Juurviljad ja köögiviljad</div>
        <div class="category">Hoidised</div>
        <div class="category">Joogid</div>
        <div class="category">Seemned ja teraviljad</div>
        <div class="category">Liha ja kala</div>
    </aside>

    <div class="products">
        <div class="product-card">
            <img src="https://via.placeholder.com/150.png" alt="pilt">
            <h3>Kartulid</h3>
            <div class="amount-container">
                <div class="minus"></div>
                <output class="amount"></output>
                <div class="plus"></div>
            </div>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/150.png" alt="pilt">
            <h3>Maasikas</h3>
            <div class="amount-container">
                <div class="minus"></div>
                <output class="amount"></output>
                <div class="plus"></div>
            </div>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/150.png" alt="pilt">
            <h3>Tomat</h3>
            <div class="amount-container">
                <div class="minus"></div>
                <output class="amount"></output>
                <div class="plus"></div>
            </div>
        </div>
    </div>

</body>
</html>