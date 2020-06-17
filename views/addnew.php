<?php $icons = new Feather\Icons; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/addnew.css">
</head>
<body>
    <form>
        <h2>Lisa enda toode</h2>
        <div>
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".png,.jpg,.jpeg" required>
            <label for="fileToUpload" class="upload-container"><?php $icons->get('upload');?>Lae üles pilt</label>
        </div>
        <input type="text" id="product_name" name="product_name" placeholder="Toote nimi" required>
        <select name="product" required>
            <option selected disabled>Vali kategooria</option>
            <option value="Piimatooted ja munad">Piimatooted ja munad</option>
            <option value="Puuviljad<">Puuviljad</option>
            <option value="Kypsetised">Küpsetised</option>
            <option value="Juurviljad ja koogiviljad">Juurviljad ja köögiviljad</option>
            <option value="Hoidised">Hoidised</option>
            <option value="Marjad">Marjad</option>
            <option value="Joogid">Joogid</option>
            <option value="Seemned ja teraviljad">Seemned ja teraviljad</option>
            <option value="Liha ja kala">Liha ja kala</option>
        </select>
        <div>
            <input type="number" step="0.01" name="price" min="0.01" max="999" placeholder="Hind" required>
            <label>€</label>
        </div>
        <label>Toote koguse tähistus</label>
        <div>
            <input type="radio" id="pc" name="amount_type" value="pc">
            <label for="pc">Tükk (tk)</label>
            <input type="radio" id="kg" name="amount_type" value="kg">
            <label for="kg">Kilogramm (kg)</label>
        </div>
        <input type="number" name="amount" placeholder="Kogus" min="1" max="9999" step="1">
        <button type="submit">Kinnita</button>
    </form>
</body>