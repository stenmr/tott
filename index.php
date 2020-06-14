<?php
require 'vendor/autoload.php';

// Andmebaasi andmed
$dbc = parse_ini_file('../db.ini');

$dsn = $dbc['driver'] . ':host=' . $dbc['host'] . ';port=' . $dbc['port'] . ';dbname=' . $dbc['name'];
$username = $dbc['username'];
$password = $dbc['password'];

Flight::register('db', 'PDO', array($dsn, $username, $password), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
});

Flight::route('/', function () {
    // Head tuleb alati laadida esimesena, ülejäänud soovitud renderdamise järjekorras
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("home.php");
    Flight::render("footer.php");
});

Flight::route('/add', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("add.php");
    Flight::render("footer.php");
});

Flight::route('/add/new', function () {
    Flight::render("head.php");
    Flight::render("navbar.php");
    Flight::render("addnew.php");
    Flight::render("footer.php");
});

Flight::route('/faq', function () {
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

Flight::route('/privacy', function () {
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

        $sql = 'INSERT INTO ISIK (email, myyja, eesnimi, perenimi, google_id) VALUES (:email, :myyja, :eesnimi, :perenimi, :google_id)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":myyja", $isSeller);
        $stmt->bindParam(":eesnimi", $first_name);
        $stmt->bindParam(":perenimi", $last_name);
        $stmt->bindParam(":google_id", $userid);

        $stmt->execute();
    } else {
        // Invalid ID token
        echo "Invalid ID token!";
    }
});

Flight::start()
?>
