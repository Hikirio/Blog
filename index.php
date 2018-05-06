<?php require_once "header.php" ?>
<?php require_once "functions.php" ?>
<?php require_once 'db.php' ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>My Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div align="center" class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php $sampleArticle = ($_GET) ? $_GET : getArticles2(); ?>
                <?php if (getArticles2()) { ?>
                    <?php foreach (getArticles2() as $article) { ?>
                        <div class="post-preview">
                            <a href="post.php?title=<?= $article['title']; ?> &sub_title=<?= $article['sub_title']; ?> &content=<?= $article['content']; ?> &author=<?= $article['author']; ?>&created_at=<?= $article['created_at']; ?>">
                                <h2 class="post-title">
                                    <?php echo $article['title'] ?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?php echo $article['content'] ?>
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#"> <?php echo $article['author'] ?></a>
                                on <?php echo $article['created_at'] ?></p>
                        </div>
                        <hr>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>


<?php require_once 'footer.php' ?>