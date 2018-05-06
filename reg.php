<?php require_once "header.php" ?>
<?php require_once "functions.php" ?>
<?php require_once 'db.php' ?>

<?php
if ($_POST){
    regUser($_POST);

}

echo "<br>";

//?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
<!--            --><?php
//            if (getErrorMsg()){ ?>
<!--            <p style="color: red">--><?//= getErrorMsg() ?>
<!--                --><?php //} ?><!--</p>-->
            <form method="post"  action="reg.php">
                <p align="center">
                <h1>Регистрация </h1>   <br>
                <div class="input-group">
                    <span class="input-group-addon label-form">Имя :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <input type="text" name="name" class="form-control" placeholder="Имя">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Фамилия :&nbsp;&nbsp;&nbsp;</span>
                    <input type="text" name="last_name" class="form-control" placeholder="Фамилия">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Логин  * :&nbsp;&nbsp;&nbsp; </span>
                    <input type="text" name="login" class="form-control" placeholder="Логин" required/>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Email  * :&nbsp;&nbsp;&nbsp; </span>
                    <input type="text" name="email" class="form-control" placeholder="Email" required/>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Пароль *:&nbsp;&nbsp;&nbsp; </span>
                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Повторите пароль * :&nbsp;&nbsp;&nbsp;</span>
                    <input type="password" name="repass" class="form-control" placeholder="Пароль" required>
                </div>
                <div style="padding-top: 15px;">
                    <input type="submit" class="btn btn-default" value="Регистрация">
                    <input type="button" class="btn btn-default" nclick="history.back();" value="Назад"/>

                </div>
            </form>
        </div>
    </div>
</div>
