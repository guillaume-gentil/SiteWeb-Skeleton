<?php
    require_once("inc/header.tpl.php");
    require_once( __DIR__ . "/data/dataArticles.php");
    // var_dump($articles);
?>

<!-- emmet: h2+article*6>a+h3+div(img+strong+time)+p+a -->
<h2 class="right__title">Latest News</h2>
<div class="posts">

    <?php foreach($articles as $id => $article) : ?>

        <article class="post">
            <a href="" class="post__category post__category--color-<?= $article['category'] ?>"><?= $article['category'] ?></a>
            <h3><?= $article['title'] ?></h3>
            <div class="post__meta">
                <img class="post__author-icon" src="<?= $article['avatar'] ?>" alt="">
                <strong class="post__author"><?= $article['author'] ?></strong>
                <time datetime="<?= $article['publicationDate'] ?>">
                    le <?= date('d-m-Y', strtotime($article['publicationDate'])); ?>
                </time>
            </div>
            <p>
                <!--
                    La fonction native PHP substr() nous retourne un segment d'une string
                    https://www.php.net/manual/fr/function.substr
                -->
                <?= substr($article['text'], 0, 80) ?>...
            </p>
            <a href="article.php?id=<?= $id ?>" class="post__link">Continue reading</a>
        </article>

    <?php endforeach; ?>

</div>

<?php require_once("inc/footer.tpl.php"); ?>
