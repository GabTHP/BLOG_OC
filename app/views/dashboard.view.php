<div class="jumbotron p-5">
    <h1 class=text-center>Mon Dashboard</h1>
</div>

<div class="container p-5">

    <h1 class="text-center"> Bienvenue sur votre Dashboard <?php echo $_SESSION['username'] ?> </h1>
    <br><br>

    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12  " style="margin-bottom:10px; height:100px; display: flex;">
            <a href="/Blog_Oc/users_all" style="height:100px; display:flex; margin:auto;" class="btn btn-primary">
                <strong>
                    <p style="margin-top:13px;padding:20px;"> Gérer les utilisateurs</p><br>
                </strong>
            </a>

        </div>

        <div class="col-xl-6 col-md-6 col-sm-12 " style="height:100px; display: flex;">
            <a href="/Blog_Oc/blog_all" style="height:100px; display:flex; margin:auto;" class="btn btn-primary">
                <strong>
                    <p style="margin-top:13px;padding:20px;"> Gérer les Publications</p><br>
                </strong>
            </a>

        </div>

    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12">

            <h2 class="text-center"> Publications en attente : </h2>


            <?php

            require '../app/db/connDb.php';

            // On affiche chaque entrée une à une

            foreach ($all_posts as $key => $post) {
                if ($post['is_valid'] == False) {
                    $count = $count + 1;
            ?> <article class="article m-3">
                        <div class="m-3">
                            <p> <b> Titre : </b><?php echo $post['title']; ?> </p>
                            <p> <b>Créé le :</b> <?php echo $post['created_at']; ?></p>
                            <?php
                            $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
                            $querry->execute(array($post['user_id']));
                            $user = $querry->fetch();

                            ?>
                            <p> <b>Auteur :</b> <?php echo $user['username']; ?> </p>

                            <form method="post" action="dashboard">
                                <input name="id" type="hidden" value="<?php echo $post['id'] ?>" placeholder="<?php echo $post['id'] ?>">
                                <input type="submit" style="margin-right:2px;" class=" btn btn-success" name="valid" value="Valider"><a class="btn btn-primary" href="/Blog_Oc/post/<?php echo $post['id'] ?>">Consulter la publication</a>
                            </form>
                        </div>
                    <?php
                }
                    ?>
                    </article>
                <?php
            }

            if ($count == 0) {
                ?> <p> Il n'y a pas de publication en attente de validation
                    </p> <?php
                        }

                            ?>
                </article>
        </div>

        <div class="col-xl-6 col-md-6 col-sm-12">
            <h2 class="text-center"> Commentaires en attente : </h2>

            <?php
            // On affiche chaque entrée une à une

            foreach ($all_comments as $key => $comment) {
                if ($comment['is_valid'] == False) {
                    $count_comment = $count_comment + 1;
            ?>
                    <article class="article m-3">
                        <div class="m-3">
                            <p> <b>Contenu :</b> <br> <?php echo $comment['content']; ?></p>
                            <p> <b>Créé le :</b> <?php echo $comment['created_at']; ?> </p>
                            <?php
                            $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
                            $querry->execute(array($post['user_id']));
                            $user = $querry->fetch();

                            ?>
                            <p> <b>Auteur : </b> <?php echo $user['username']; ?></p>
                            <form method="post" action="dashboard">
                                <input name="id" type="hidden" value="<?php echo $comment['id'] ?>" placeholder="<?php echo $comment['id'] ?>">
                                <input type="submit" class="btn btn-success" style="padding-right:2px;" name="valid_comment" value="Valider le commentaire"> <a class="btn btn-primary" target="_blank" href="/Blog_Oc/post/<?php echo $comment['post_id'] ?>">Consulter la publication</a>
                            </form>
                            <form method="post" action="dashboard">
                                <input name="id" type="hidden" value="<?php echo $comment['id'] ?>" placeholder="<?php echo $comment['id'] ?>">
                                <input type="submit" class="btn btn-danger" style="margin-top:2px;" name="delete_com" value="Supprimer">
                            </form>
                        </div>
                    <?php
                }
                    ?>
                    </article>
                <?php
            }

            if ($count == 0) {
                ?> <p> Il n'y a pas de publication en attente de validation
                    </p> <?php
                        }

                            ?>
                </article>
        </div>
    </div>

</div>