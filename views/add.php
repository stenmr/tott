<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/add.css">
</head>
<body>
    <form>
        <h2>Lisa uus toode</h2>
        <select name="product">
            <option value="" selected disabled>Vali toode</option>
        </select>
        <input type="number" name="amount" placeholder="Kogus" max="999">
        <button class="button addproduct">Kinnita</button>
        <p>
            Ei leidnud sobivat toodet? <a href="/add/new">Lisa enda toode</a>.
        </p>
    </form>
</body>