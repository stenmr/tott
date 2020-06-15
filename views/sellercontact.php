<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/account.css">
</head>
<body>
    <div class="account_container">
        <aside class="menu_box">
            <a href="/talu/minu_kontakt"><div class="menu">Kontaktandmed</div></a>
            <a href="/talu/minu_tooted"><div class="menu">Minu tooted</div></a>
            <a href="/talu/minu_tellimused"><div class="menu">Tellimused</div></a>
            <a href="/talu/lisa"><div class="menu">Lisa tooteid</div></a>
        </aside>

        <form>
        <h2>Muuda kontaktandmeid</h2>
        <label>Talu nimi</label>
        <input type="text" name="farm_name" placeholder="Talu nimi" required>
        <label>Aadress</label>
        <input type="text" name="farm_address" placeholder="Aadress" required>
        <label>E-mail</label>
        <input type="text" name="email" placeholder="email@talu.ee" required>
        <label>Panga informatsioon</label>
        <input type="text" name="iban" placeholder="Kontonumber" required>
        <input type="text" name="iban_owner" placeholder="Konto omanik" required>
        <button type="submit" id="save_contact">Salvesta muudatused</button>
    </form>
    </div>
</body>