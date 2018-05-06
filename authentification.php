<?php require_once "db.php"; ?>
<?php require_once "functions.php"; ?>

<?php
if (!empty($_REQUEST['password']) and !empty($_REQUEST['login'])) {

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $hash = md5($password);

    $query = 'SELECT * FROM users WHERE login="' . $login . '" AND password="' . $hash . '"';
    $result = mysqli_query($link, $query); 
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {

        session_start();
        $_SESSION['auth'] = true;
        require('admin.php');
        exit();
  
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
    } else {
        echo 'чет не так';

    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<style>
    /* Demo Background */
    body {
        background-image: url(img/about-bg.jpg)
    }

    /* Form Style */
    .form-horizontal {
        background: #fff;
        margin-top: 30%;
        padding-bottom: 40px;
        border-radius: 75px;
        text-align: center;
    }

    .form-horizontal .heading {
        display: block;
        font-size: 35px;
        font-weight: 700;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
        margin-bottom: 30px;
    }

    .form-horizontal .form-group {
        padding: 0 40px;
        margin: 0 0 25px 0;
        position: relative;
    }

    .form-horizontal .form-control {
        background: #f0f0f0;
        border: none;
        border-radius: 20px;
        box-shadow: none;
        padding: 0 20px 0 45px;
        height: 40px;
        transition: all 0.3s ease 0s;
    }

    .form-horizontal .form-control:focus {
        background: #e0e0e0;
        box-shadow: none;
        outline: 0 none;
    }

    .form-horizontal .form-group i {
        position: absolute;
        top: 12px;
        left: 60px;
        font-size: 17px;
        color: #c8c8c8;
        transition: all 0.5s ease 0s;
    }

    .form-horizontal .form-control:focus + i {
        color: #00b4ef;
    }

    .form-horizontal .fa-question-circle {
        display: inline-block;
        position: absolute;
        top: 12px;
        right: 60px;
        font-size: 20px;
        color: #808080;
        transition: all 0.5s ease 0s;
    }

    .form-horizontal .fa-question-circle:hover {
        color: #000;
    }

    r: pointer

    ;
    }

    .form-horizontal .main-checkbox input[type=checkbox] {
        visibility: hidden;
    }

    .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after {
        opacity: 1;
    }

    .form-horizontal .text {
        float: left;
        margin-left: 7px;
        line-height: 20px;
        padding-top: 5px;
        text-transform: capitalize;
    }

    .form-horizontal .btn {
        font-size: 14px;
        color: #fff;
        background: #00b4ef;
        border-radius: 30px;
        padding: 10px 25px;
        border: none;
        text-transform: capitalize;
        transition: all 0.5s ease 0s;
    }

    @media only screen and (max-width: 479px) {
        .form-horizontal .form-group {
            padding: 0 25px;
        }

        .form-horizontal .form-group i {
            left: 45px;
        }

        .form-horizontal .btn {
            padding: 10px 20px;
        }
    }
</style>

<div align="center" class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form accept-charset="UTF-32" class="form-horizontal" method="post">
                <span class="heading">Autorization</span>
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="Login">
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <i class="fa fa-lock"></i>
                </div>
                <button type="submit" name="sub" class="btn btn-default">Sign In</button>
                <input type="button" class="btn btn-default" onclick="history.back();" value="Exit"/>

            </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->


