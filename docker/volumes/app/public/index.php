<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Test PHP</title>
</head>
<body>
<?php

error_log(E_ALL);

$str = 'salut';

$db = new PDO('mysql:host=mariadb;dbname=salut;charset=utf8mb4', 'root', 'secret');

$query = $db->prepare('INSERT INTO ppp (str) VALUES (?)');
$query->execute([$str]);
echo $str;
echo '<br />';

$query = $db->prepare('SELECT * FROM ppp');
$query->execute();
$r = $query->fetchAll();
var_dump($r);

?>
</body>
</html>
