<div class="jumbotron p-5 text-center">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p>
        <?php
        $max = 200;
        //Variable contenant ton texte à couper :)
        $texte = $post['content'];
        //Condition qui teste que le texte est bien plus grand que la phrase à couper, sinon ca sert à rien de la couper :D
        if (strlen($texte) > $max) {
            //Fonction qui récupère la position du premier espace à partir de la position $max pour éviter de couper un mot en plein milieu
            $espace = strpos($texte, ' ', $max);
            //Fonction qui récupère l'extrait jusqu'à l'espace préalablement cherché auquel on ajoute "..."
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
            <img src="/Blog_Oc/public/assets/img/upload/<?php echo $post['featured_image'] ?>" width="1500" height="1368" alt="<?php echo $post['featured_image'] ?>">
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
    $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
    $querry->execute(array($post['user_id']));
    $user = $querry->fetch();
    ?>
    <p class="text-muted">Rédigé par <?php echo $user['username']; ?>,
        <?php
        if ($post['updated_at'] == null) {
        ?>
            publié le <?php echo $post['created_at'];
                    } else {
                        ?>
            dernière mise à jour le <?php echo $post['updated_at'];
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
                <h2>Auteur <br> <?php echo $comment['pseudo']; ?> </h2>
                Contenu <br>
                <?php echo ($comment['content']); ?> <br>
                <p> <?php
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
                        <p> Vous devez être connecté pour laisser un commentaire </p>
                        <a class="btn btn-primary" href="/Blog_Oc/sign_in"> Se connecter</a>
                    <?php
                    }
                    ?>
                </div>
</div>

<?php include '../app/views/footer.view.php'; ?>


</html>