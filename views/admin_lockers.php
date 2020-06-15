<body>
    <h1>Kasutajatele kappide määramine</h1>
    <li>
        <?php
        foreach ($lockers as $item) {
            $email = $item->email;
            $locker = $item->locker;
            include 'admin_locker_entry.php';
        }
        ?>
    </li>
</body>