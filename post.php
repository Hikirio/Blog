<?php require_once 'header.php' ?>
<?php require_once 'functions.php' ?>
<?php require_once 'db.php' ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                    <?php $article = getArticles2() ?>
                    <?php if ($article) { ?>
                            <div class="page-heading">
                                <div  class="post-title">
                                <h1><?= $_GET['title'];?></h1>
                                <br>
                                <?= $_GET['sub_title'];?>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
</header>

<div class="article">
    <p align="center"> <?= $_GET['content'];?></p>

</div>
<div class="pos">
    <p align="center" >Posted by
        <a href="#"> <?= $_GET['author'] ?></a>
        on <?= $_GET['created_at']?></p>
</div>

<?php require_once 'footer.php' ?>
