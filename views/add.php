  
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/add.css">
</head>
<body>
    <form method="post">
        <h2>Lisa uus toode</h2>
        <select name="product" required>
            <option value="" selected disabled>Vali toode</option>
            <?php
            foreach ($newproducts as $user) {
                $name = $user->nimi;
                $price = $user->hind;
                $unit = $user->yhik_kg_mitte_tk;
                include 'add_entry.php';
            }
            ?>
        </select>
        <input type="number" name="amount" placeholder="Kogus" min="1" max="999" required>
        <button class="button addproduct">Kinnita</button>
        <p>
            Ei leidnud sobivat toodet? <a href="/talu/lisa/uus">Lisa enda toode</a>.
        </p>
    </form>
</body>