<body>
    <h1>Uute talude lisamine</h1>
    <form>
        <label>Talu meil</label>
        <input type="text" name="email" placeholder="talu@email.ee" required>
        <button type="submit" >Lisa talu</button>
    </form>
    <li>
        <?php
        foreach ($farms as $user) {
            $email = $user->nimi;
            $google_id = $user->hind;
            include 'admin_farm_entry.php';
        }
        ?>
    </li>
</body>