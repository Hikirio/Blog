<?php
/*
function getArticle()
{
    $arr = [];
    for ($i = 0; $i <= 5; $i++) {
        $arr[] = [//первый доступный элемент массива
            'title' => 'Некая статья под номером' . ' ' . $i,
            'content' => 'Тут будет какое-то краткое описание' . ' ' . $i
        ];
    }
    return $arr;
}

function getDatet()
{
    $dmg = [];
    $dmg[] = [//первый доступный элемент массива
        'day' => rand(1, 31),
        'mounth' => rand(1, 12),
        'year' => '2018'
    ];

    return $dmg;

}

function getName()
{
    $named = [];
    $named[] = [
        0 => 'Иван Иванович',
        1 => 'Петр Петрович',
        2 => 'Сергей Сергеевич',
        3 => 'Левый Чувак',
        4 => 'Ну закончилась фантазия'
    ];
    $key = array_rand($named);
    return $named[$key];

}*/

require_once "db.php";
session_start();
function connectDb()
{
    try {
        $dbh = new PDO('mysql::host=localhost;dbname=custom_blog', 'root', '');
        return $dbh;
    } catch (PDOException $e) {
        print "Error:   " . $e->getMessage() . "<br>";

        return false;
    }
}

function getArticles2()
{
    $db = connectDb();
    if ($db) {
        $t = $_POST['title'];
        $sql = "SELECT * FROM `articles` ORDER BY id DESC";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;

}


function getAuthor($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM `users` where id";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

function addContent()
{


    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $q = connectDb();
    if ($q) {
        try {
            $sql = "INSERT INTO articles (id, title, sub_title, content,created_at , author)
    VALUES(null ,$title,$sub_title,$content,CURRENT_TIMESTAMP ,$author)";
            $q->exec($sql);
        } catch
        (PDOException $e) {
            die("Oh noes! There's an error in the query!");
        }
    }


}


function insertUser($UserData)
{
    var_dump($UserData);
    $db = connectDb();
    if ($db) {
        try {
            $pass = md5($UserData['password']);
            $sql = "INSERT INTO users(name, last_name, login, email, password)
            VALUES(:name, :last_name, :login, :email, :password)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':name', $UserData['name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $UserData['last_name'], PDO::PARAM_STR);
            $stmt->bindParam(':login', $UserData['login'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $UserData['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $pass, PDO::PARAM_STR);

            var_dump($stmt->execute());
        } catch (PDOException $e) {

        }
    }
    return false;
}


function regUser(array $UserData)
{
    if ($UserData['password'] !== $UserData['repass']) {
        $_SESSION['error_message'] = 'Не верный повтор пароля!';
        return;
    }
    if (!isset($UserData['login']) || empty($UserData['login'])) {
        $_SESSION['error_message'] = 'Логин не может быть пустым!';
        return;
    }
    if (!isset($UserData['email']) || empty($UserData['email'])) {
        $_SESSION['error_message'] = 'Мыло не может быть пустым!';
        return;
    }
    if (insertUser($UserData)) {
        $_SESSION['error_message'] = false;
    } else {
        $_SESSION['error_message'] = 'ВСе гуд';
    }


}

//валидация перед отправкой


function getErrorMsg()
{
    return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
}









