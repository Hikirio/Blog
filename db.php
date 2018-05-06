<?php
/**
 * Created by PhpStorm.
 * User: Анатолий
 * Date: 30.04.2018
 * Time: 19:37
 */

$host = 'localhost'; // адрес сервера
$database = 'custom_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));


