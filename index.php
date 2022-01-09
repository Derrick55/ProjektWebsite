<?php
error_reporting(-1);
ini_set('Display_errors', 'on');

$username = "shop";
$password = "qwertz";
$dsn = "mysql:host=mbp-von-derrick;dbname=shop;charset=utf8";
$db = new PDO($dsn, $username, $password);
$sql = "SELECT ID,Title,Beschreibung,Prize FROM products";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title>Derrick Erste Website für foto</title>
<meta charset="utf-8">
<link rel="stylesheet" href="assests/css/bootstrap.min.css">
<link rel="stylesheet" href="assests/css/styles.css">
</head>
<body>

<header class="jumbotron">
<div class="container">
<h1> Willkommen auf meinen Online Shop</h1>
</div>
</header>
<section class = "container" id="products">
    <div class="row">
    <?php while ($row = $result->fetch()): ?>
        <div class="col">
        <?php include "card.php"?>
        </div>
        <?php endwhile;?>
        </div>
</section>
<script src="assests/js/bootstrap.bundle.js"></script>
</body>
</html>
