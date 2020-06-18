<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

// Andmebaasi andmed
$dbc = parse_ini_file('../db.ini');

$dsn = $dbc['driver'] . ':host=' . $dbc['host'] . ';port=' . $dbc['port'] . ';dbname=' . $dbc['name'];
$username = $dbc['username'];
$password = $dbc['password'];

// Talunikud
$pdo3 = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);
$sql3 = 'SELECT email FROM ISIK WHERE myyja = 1';
$stmt3 = $pdo3->prepare($sql3);
$stmt3->execute();

$farmers = $stmt3->fetchAll();
Flight::set('farmers', $farmers);

Flight::register('db', 'PDO', array($dsn, $username, $password), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
});

// Administraatorid
$admins = parse_ini_file('../admins.ini');
Flight::set('admins', $admins['admins']);

Flight::route('/talu/lisa', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {

        $pdo = Flight::db();

        $sql = 'SELECT nimi, hind, yhik_kg_mitte_tk FROM TOODE';

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("add.php", array('newproducts' => $result));
        Flight::render("footer.php");
    }
});

Flight::route('GET /talu/lisa/uus', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("addnew.php");
        Flight::render("footer.php");
    }
});

Flight::route('POST /talu/lisa/uus', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        $request = Flight::request();

        $image = $request->data->image_upload;
        $product_name = $request->data->product_name;
        $product_type = $request->data->product_type;
        $price = $request->data->price;
        $amount = $request->data->amount;
        $amount_type = $request->data->amount_type;

        if ($image && $product_name && $product_type && $price && $amount && $amount_type) {

            $pdo = Flight::db();

            $query = 'SELECT COUNT(TOODE_toote_id) from TOODE';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $count = $stmt->fetch();

            $url = 'images/product/' . $count + 1;
            $img = Image::make($image)->resize(300, 200);
            $img->save($url, 90);

            $amount_bool = $amount_type == 'kg' ? 1 : 0;

            $sql = 'INSERT INTO TOODE (kategooria, nimi, hind, yhik_kg_mitte_tk, pilt) VALUES (:product_type, :product_name, :price, :amount_type, :image_url)';

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":product_type", $product_type);
            $stmt->bindParam(":product_name", $product_name);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":amount_type", $amount_bool);
            $stmt->bindParam(":image_url", $url);

            $stmt->execute();

            $product_id = $pdo->lastInsertId();

            $sql2 = 'INSERT INTO TALU_TOODE (kogus, TALU_talu_id, TOODE_toote_id) VALUES (:amount, :farm_id, :product_id)';

            $stmt2 = $pdo->prepare($sql);

            $stmt2->bindParam(":amount", $amount);

            // TODO: Hankida farm_id kusagilt!
            $stmt2->bindParam(":farm_id", $farm_id);
            $stmt2->bindParam(":product_id", $product_id);

            $stmt2->execute();
        } else {
            echo "Midagi läks valesti.";
        }
    }
});

Flight::route('/ostukorv', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("cart.php");
    Flight::render("footer.php");
});
Flight::route('/maksma', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("pay.php");
    Flight::render("footer.php");
});
Flight::route('/kkk', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("faq.php");
    Flight::render("footer.php");
});
Flight::route('/talu', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("selleraccount.php");
        Flight::render("footer.php");
    }
});

Flight::route('/talu/minu_tooted', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        $pdo = Flight::db();

        $sql = 'SELECT TALU_TOODE.kogus, TALU_TOODE.TALU_talu_id, TOODE.nimi, TOODE.hind, TOODE.yhik_kg_mitte_tk, TOODE.pilt
    FROM TOODE JOIN TALU_TOODE on TOODE_toote_id = toote_id';

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("myproducts.php", array('myproducts' => $result));
        Flight::render("footer.php");
    }
});

Flight::route('/talu/minu_kontakt', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("sellercontact.php");
        Flight::render("footer.php");
    }
});

Flight::route('/talu/minu_tellimused', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('farmers'))) {
        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("sellerorders.php");
        Flight::render("footer.php");
    }
});

Flight::route('/privaatsus', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("privacy.php");
    Flight::render("footer.php");
});

Flight::route('/tellimused', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("orders.php");
    Flight::render("footer.php");
});

Flight::route('/administraator', function () {
    // Kui sessiooni email on üks admini emailidest
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('admins'))) {
        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("admin.php");
        Flight::render("footer.php");
    } else {
        Flight::redirect("/");
    }
});

Flight::route('GET /administraator/talud', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('admins'))) {

        $pdo = Flight::db();

        $sql = 'SELECT * FROM ISIK WHERE myyja = 1';

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("admin_farms.php", array('farms' => $result));
        Flight::render("footer.php");
    } else {
        Flight::redirect("/");
    }
});

Flight::route('POST /administraator/talud', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('admins'))) {

        $request = Flight::request();

        $email = $request->data->email;

        // TODO: Kontrolli et email eksisteerib andmebaasis
        if ($email) {
            $pdo = Flight::db();

            $sql = 'UPDATE ISIK SET myyja = 1 WHERE email = :email';

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $pdo3 = Flight::db();
            $sql3 = 'SELECT email FROM ISIK WHERE myyja = 1';
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute();

            $farmers = $stmt3->fetchAll();
            Flight::set('farmers', $farmers);

            Flight::redirect('/administraator/talud');

        }
    }
});

Flight::route('GET /administraator/kapid', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('admins'))) {

        $pdo = Flight::db();

        $sql = 'SELECT * FROM ISIK WHERE kapp IS NOT NULL';

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        Flight::render("head.php");
        Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
        Flight::render("admin_lockers.php", array('lockers' => $result));
        Flight::render("footer.php");
    } else {
        Flight::redirect("/");
    }
});

Flight::route('POST /administraator/kapid', function () {
    session_start();
    if (isset($_SESSION['email']) && in_array($_SESSION['email'], Flight::get('admins'))) {

    }
});

// 404 errori leht
Flight::map('notFound', function () {
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("notfound.php");
    Flight::render("footer.php");
});

Flight::route('/(@category)', function ($category) {

    $pdo = Flight::db();

    $sql;
    $category_converted = str_replace('+', ' ', $category);

    if (isset($category)) {
        $sql = 'SELECT * FROM TOODE WHERE kategooria = :category';
    } else {
        $sql = 'SELECT * FROM TOODE';
    }

    $stmt = $pdo->prepare($sql);

    if (isset($category)) {
        $stmt->bindParam(":category", $category_converted);
    }

    $stmt->execute();

    $result = $stmt->fetchAll();
    $farms = [];

    // Selline asi on ilmselt kriminaalne
    foreach ($result as $card) {
        $sql2 = 'SELECT TALU_TOODE.`talu_toote_id`, TALU.`nimi` FROM TALU_TOODE JOIN TOODE ON toote_id = TOODE_toote_id JOIN TALU ON talu_id = TALU_talu_id WHERE TOODE_toote_id = :product_id';
        $stmt2 = $pdo->prepare($sql2);
        $id = $card->toote_id;
        $stmt2->bindParam(":product_id", $id, PDO::PARAM_INT);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        $farms[$card->toote_id] = $result2;
    }

    // Head tuleb alati laadida esimesena, ülejäänud soovitud renderdamise järjekorras
    Flight::render("head.php");
    Flight::render("navbar.php", array('farmers' => Flight::get('farmers')));
    Flight::render("home.php", array('cards_farms' => ['cards' => $result, 'farms' => $farms]));
    Flight::render("footer.php");
});

// API route'id

// Google'iga sisselogimisel saadetakse ID token serverile
// https://developers.google.com/identity/sign-in/web/backend-auth
Flight::route('POST /api/v1/tokensignin', function () {

    // OAuth andmed
    $oauth_credentials = '../oauth-credentials.json';

    $request = Flight::request();

    $id_token = $request->data->idtoken;

    $client = new Google_Client();
    $client->setAuthConfig($oauth_credentials);
    $client->setAccessToken($id_token);
    $client->addScope('email');

    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
        $userid = $payload['sub'];
        $email = $payload['email'];
        $first_name = $payload['given_name'];
        $last_name = $payload['family_name'];

        /* Hetkel kasutamata
        $is_email_verified = $payload['email_verified'];
        $full_name = $payload['name'];
        $picture = $payload['picture']; // .jpg ilmselt
         */

        $isSeller = 0;

        $pdo = Flight::db();

        $exists = 'SELECT * FROM ISIK WHERE google_id = :google_id LIMIT 1';

        $exists_stmt = $pdo->prepare($exists);
        $exists_stmt->bindParam(":google_id", $userid);
        $exists_stmt->execute();

        $result = $exists_stmt->fetch();

        // Kui kasutajat ei eksisteeri siis loome uue
        if (!$result) {
            $sql = 'INSERT INTO ISIK (email, myyja, eesnimi, perenimi, google_id) VALUES (:email, :myyja, :eesnimi, :perenimi, :google_id)';

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":myyja", $isSeller);
            $stmt->bindParam(":eesnimi", $first_name);
            $stmt->bindParam(":perenimi", $last_name);
            $stmt->bindParam(":google_id", $userid);

            $stmt->execute();
        }
        session_start();
        $_SESSION['email'] = $email;
    } else {
        // Invalid ID token
        echo "Invalid ID token!";
    }
});

Flight::route('POST /api/v1/cart', function () {

    $request = Flight::request();

    $cart = $request->data->cart;

    $pdo = Flight::db();

    $sql = 'SELECT * FROM TOODE WHERE kategooria = :category';

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":category", $category);

    $stmt->execute();

    $result = $stmt->fetchAll();

    Flight::json(array('result' => $result));
});

Flight::start()
?>
