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

        <form>
        <h2>Muuda kontaktandmeid</h2>
        <label>Talu nimi</label>
        <input type="text" id="farm_name" name="farm_name" placeholder="Talu nimi">
        <label>Aadress</label>
        <input type="text" id="farm_address" name="farm_address" placeholder="Aadress">
        <label>E-mail</label>
        <input type="text" id="email" name="email" placeholder="email@talu.ee">
        <label>Panga informatsioon</label>
        <input type="text" id="iban" name="iban" placeholder="Kontonumber">
        <input type="text" id="iban_owner" name="iban_owner" placeholder="Konto omanik">
        <button type="submit" id="save_contact">Salvesta muudatused</button>
    </form>
    </div>
</body>