<h1> Bienvenue sur votre Dashboard <?php echo $_SESSION['username'] ?> </h1>

<h2> Publications en attente : </h2>

<?php

require '../app/db/connDb.php';

// On affiche chaque entrée une à une

foreach($all_posts as $key => $post) {
    if ($post['is_valid'] == False) {
        $count = $count + 1 ;
        ?> <p> <?php echo $post['title']; ?> <br>
        <p> Créé le : <?php echo $post['created_at']; ?> <br>
        <?php 
        $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
        $querry->execute(array($post['user_id']));
        $user = $querry->fetch();

        ?>
        <p> Auteur : <?php echo $user['username']; ?>
        <br><a href="/Blog_Oc/post/<?php echo $post['id']?>">Consulter la publication</a>
        <form method="post" action="dashboard" >
            <input  name="id" type="hidden" value="<?php echo $post['id'] ?>" placeholder="<?php echo $post['id'] ?>">
            <input type="submit" name="valid" value="Valider le post">
        </form>
        <?php 
    }
}

if ($count == 0) {
    ?> <p> Il n'y a pas de publication en attente de validation <p> <?php
}

    ?>

<h2> Commentaires en attente : </h2>

<?php
// On affiche chaque entrée une à une

foreach($all_comments as $key => $comment) {
    if ($comment['is_valid'] == False) {
        $count_comment = $count_comment + 1 ;
        ?> <p> <?php echo $comment['title']; ?> <br>
        <?php echo $comment['content']; ?> <br>
        <p> Créé le : <?php echo $comment['created_at']; ?> <br>
        <?php 
        $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
        $querry->execute(array($post['user_id']));
        $user = $querry->fetch();

        ?>
        <p> Auteur : <?php echo $user['username']; ?>
        <br><a href="/Blog_Oc/post/<?php echo $comment['post_id']?>">Consulter la publication</a>
        <form method="post" action="dashboard" >
            <input  name="id" type="hidden" value="<?php echo $comment['id'] ?>" placeholder="<?php echo $comment['id'] ?>">
            <input type="submit" name="valid_comment" value="Valider le commentaire">
        </form>
        <?php 
    }
}

if ($count == 0) {
    ?> <p> Il n'y a pas de publication en attente de validation <p> <?php
}

    ?>




