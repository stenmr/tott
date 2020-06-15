<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

// Andmebaasi andmed
$dbc = parse_ini_file('../db.ini');

$dsn = $dbc['driver'] . ':host=' . $dbc['host'] . ';port=' . $dbc['port'] . ';dbname=' . $dbc['name'];
$username = $dbc['username'];
$password = $dbc['password'];

Flight::register('db', 'PDO', array($dsn, $username, $password), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
});

function clog($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

Flight::route('/', function () {

    $pdo = Flight::db();

    $sql = 'SELECT * FROM TOODE LIMIT 15';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $cards = [];
    $result = $stmt->fetchAll();

    // Head tuleb alati laadida esimesena, ülejäänud soovitud renderdamise järjekorras
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("home.php", array('cards' => $result));
    Flight::render("footer.php");
});

Flight::route('/talu/lisa', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("add.php");
    Flight::render("footer.php");
});

Flight::route('GET /talu/lisa/uus', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("addnew.php");
    Flight::render("footer.php");
});

Flight::route('POST /talu/lisa/uus', function () {

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


        $sql = 'INSERT INTO TOODE (kategooria, nimi, hind, yhik_kg_mitte_tk, pilt) VALUES (:product_type, :product_name, :price, :amount_type, :image_url)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":product_type", $product_type);
        $stmt->bindParam(":product_name", $product_name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":amount_type", $amount_type);
        $stmt->bindParam(":image_url", $url);

        $stmt->execute();

        $product_id = $pdo->lastInsertId();

        $sql2 = 'INSERT INTO TALU_TOODE (kogus, TALU_talu_id, TOODE_toote_id) VALUES (:amount, :farm_id, :product_id)';

        $stmt2 = $pdo->prepare($sql);

        $stmt2->bindParam(":amount", $amount);
        $stmt2->bindParam(":farm_id", $farm_id);
        $stmt2->bindParam(":product_id", $product_id);
    } else {
        echo "Midagi läks valesti.";
    }
});

Flight::route('/kkk', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("faq.php");
    Flight::render("footer.php");
});
Flight::route('/talu', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("selleraccount.php");
    Flight::render("footer.php");
});

Flight::route('/talu/minu_tooted', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("myproducts.php");
    Flight::render("footer.php");
});

Flight::route('/talu/minu_kontakt', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("sellercontact.php");
    Flight::render("footer.php");
});

Flight::route('/talu/minu_tellimused', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("sellerorders.php");
    Flight::render("footer.php");
});

Flight::route('/privaatsus', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("privacy.php");
    Flight::render("footer.php");
});

// Display custom 404 page
// TODO: Lisada siia midagi
Flight::map('notFound', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("notfound.php");
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
    } else {
        // Invalid ID token
        echo "Invalid ID token!";
    }
});

Flight::start()
?>
