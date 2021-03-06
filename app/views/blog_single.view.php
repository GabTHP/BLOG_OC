<div class="jumbotron p-5 text-center">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p>
        <?php
        $max = 200;
        $texte = $post['content'];
        if (strlen($texte) > $max) {
            $espace = strpos($texte, ' ', $max);
            $chapo = substr($texte, 0, $espace) . '...';
            echo $chapo;
        } else {
            echo $texte;
        }
        ?>
    </p>
</div>

<div class="container p-5">
    <div>
        <a href="/Blog_Oc/blog_all">
            <p class="text-muted"> Retour <p>
        </a>
        <div class="article-box">
            <?php if ($post['featured_image'] == '') {
            ?>
                <img src="/Blog_Oc/public/assets/img/devblog.jpg">
            <?php
            } else {
            ?>
                <img src="/Blog_Oc/public/assets/img/upload/<?php echo $post['featured_image'] ?>" width="1500" height="1368" alt="<?php echo $post['featured_image'] ?>">
            <?php }
            ?>
        </div>
        <h3>
            <?php echo htmlspecialchars($post['title']); ?>
        </h3>

        <p>
            <?php
            echo nl2br(htmlspecialchars($post['content']));
            ?>
        </p>
    </div>
    <?php
    $user = get_user_post($post['user_id']);
    ?>
    <p class="text-muted">Rédigé par <?php echo strip_tags($user['username']); ?>,
        <?php
        if ($post['updated_at'] == null) {
        ?>
            publié le <?php echo strip_tags($post['created_at']);
                    } else {
                        ?>
            dernière mise à jour le <?php echo strip_tags($post['updated_at']);
                                }
                                    ?>
    </p>
    <br>
    <h3> Donnez votre Avis : </h3>
    <?php
    require '../app/db/connDb.php';

    if (!$comments) {
    ?><p><?php echo "Il n'y a pas encore de commentaire, soyez le premier à réagir ! :)"; ?></p>
        <?php
    } else {
        $count = 0;
        foreach ($comments as $key => $comment) {

            if ($comment['is_valid'] == True) {
                $count = $count + 1;
        ?></b>
                <p>Auteur : <?php echo strip_tags($comment['pseudo']); ?><br>
                    <?php echo strip_tags(($comment['content'])); ?> <br>
                </p> <?php
                    }
                }
                if ($count == 0) {
                    echo "Il n'y a pas encore de commentaire, soyez le premier à réagir ! :)";
                }
            }
                        ?>

    <div>

        <h2>Ajouter un commentaire :</h2>
        <?php if (isset($_SESSION['username'])) {
        ?>
            <form method="post" action="" accept-charset="utf-8">
                <textarea class="form-control" type="text" name="content" placeholder="Texte"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Publier" name="submit" />
            </form>
        <?php
        } else {
        ?>
            <p ca> Vous devez être connecté pour laisser un commentaire </p>
            <a class="btn btn-primary" href="/Blog_Oc/sign_in"> Se connecter</a>
        <?php
        }
        ?>
    </div>
</div>

<?php include '../app/views/footer.view.php'; ?>


</html>