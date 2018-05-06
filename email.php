<?php
/**
 * Created by PhpStorm.
 * User: Анатолий
 * Date: 30.04.2018
 * Time: 16:10
 */

$adminemail = "localhost";  // e-mail админа

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];
$messeng = $name.$email.$phone.$msg;
mail("$adminemail", "Тест","MSG:" . $messeng);