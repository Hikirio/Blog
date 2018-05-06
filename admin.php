<?php require_once "header.php" ?>
<?php //require_once "functions.php" ?>
<?php require_once 'db.php' ?>
<?php //if (empty($_SESSION)) {
//    require('index.php');
//}
//?>
<?php

$title = $_POST['title'];
$sub_title = $_POST['sub_title'];
$content = $_POST['content'];
$date = $_POST['date'];
$author = $_POST['author'];

$q = connectDb();
if ($q) {
    try {
        $sql = "INSERT INTO articles (id, title, sub_title, content, created_at , author)
    VALUES(null ,'$title','$sub_title','$content',current_timestamp ,'$author')";
        $q->exec($sql);
    } catch
    (PDOException $e) {
        die("Не-а");
    }
}
?>
<?php

//$title = $_POST['title'];
//$sub_title = $_POST['sub_title'];
//$content = $_POST['content'];
//$date = $_POST['date'];
//
//$q = connectDb();
//if ($q) {
//    try {
//        $sql = "INSERT INTO articles (id, title, sub_title, content,date)
//    VALUES(null ,$title,$sub_title,$content,$date)";
//        $q->exec($sql);
//    } catch
//    (PDOException $e) {
//        die("Oh noes! There's an error in the query!");
//    }
//}


$edit_title = $_POST['edit_title'];
$edit_sub_title = $_POST['edit_sub_title'];
$edit_content = $_POST['edit_content'];
$new_edit_title = $_POST['new_edit_title'];

$q = connectDb();
if ($q) {
    try {
        $sql = "UPDATE articles 
          SET  title =  '$new_edit_title', sub_title = '$edit_sub_title', content = '$edit_content'
          where title = '$edit_title' ";
        $q->exec($sql);
    } catch
    (PDOException $e) {
        die("Не пашет");
    }
}
?>

<?php

$del_title = $_POST['del_title'];

$del = connectDb();
if ($del) {
    try {
        $sql1 = "DELETE FROM `articles` WHERE title = '$del_title'";
        $del->exec($sql1);
    } catch (PDOException $e) {
        die("Error");
    }
}

?>

    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Админ панель</h1>
                        <?php
                        if ($_SESSION) {
                            echo 'Hello' . ' ' . $_POST['login'];
                        }

                        ?>
                        <a href="index.php">Выход</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="admin.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon label-form">Введите заголовок статьи :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                        <input type="text" name="title" class="form-control" placeholder="Заголовок">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Введите краткое описание :&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" name="sub_title" class="form-control" placeholder="Под заголовок">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Введите содержание стаьи :&nbsp;&nbsp;&nbsp; </span>
                        <textarea rows="7" name="content" class="form-control" placeholder="Содержание"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Введите автора :&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" name="author" class="form-control" placeholder="автор">
                    </div>
                    <div style="padding-top: 15px;">
                        <input type="submit" class="btn btn-default" name="add" value="Добавить новую статью">
                    </div>

                </form>
                <br>
                <form method="POST">
                    <div class="input-group">
                        <span class="input-group-addon label-form">Введите заголовок статьи для удаления : </span>
                        <input type="text" name="del_title" class="form-control" placeholder="Заголовок">
                    </div>
                    <div style="padding-top: 15px;">
                        <input type="submit" class="btn btn-default" value="Удалить статью">
                    </div>
                </form>
                <br>
                <form method="POST">
                    <div class="input-group">
                        <span class="input-group-addon label-form">Введите заголовок статьи для редактирования: </span>
                        <input type="text" name="edit_title" class="form-control" placeholder="Заголовок">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon label-form">Введите новый заголовок статьи для редактирования: </span>
                        <input type="text" name="new_edit_title" class="form-control" placeholder="Заголовок">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon label-form">Введите краткое описание статьи для редактирования: </span>
                        <input type="text" name="edit_sub_title" class="form-control" placeholder="Под заголовок">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Введите содержание стаьи для редактирования:&nbsp;&nbsp;&nbsp; </span>
                        <textarea rows="7" name="edit_content" class="form-control" placeholder="Содержание"></textarea>
                    </div>
                    <div style="padding-top: 15px;">
                        <input type="submit" class="btn btn-default" value="Редактировать статью">
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php
require_once "footer.php";