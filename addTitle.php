<?php
/**
 * Created by PhpStorm.
 * User: Анатолий
 * Date: 04.05.2018
 * Time: 11:48
 */
require_once 'db.php'; // подключаем скрипт
$dsn = "mysql:host=$host;dbname=$database";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

$title = $_POST['title'];
$sub_title = $_POST['sub_title'];
$content = $_POST['content'];
$date = $_POST['date'];


$query = $pdo->query("INSERT INTO `articles` (`title`, `sub_title`, `content`)
    VALUES(null ,'$title', '$sub_title','$content','$date'");
var_dump($query);

?>