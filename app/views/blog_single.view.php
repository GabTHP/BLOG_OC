
<div class="news">
    <h3>
       Titre <br> <?php echo htmlspecialchars($post['title']); ?>
    </h3>
    
    <p>
        <b>Contenu</b> <br><br>
    <?php
     echo nl2br(htmlspecialchars($post['content']));
    ?>
    </p>
</div>

<h2>
Lite des Commentaires
<h2>
<?php
require '../app/db/connDb.php'; 

if (!$comments) {
    echo 'Pas encore de Commentaires';
}

else {
    $count = 0 ;
    foreach($comments as $key => $comment) {
        
        if ($comment['is_valid'] == True) 
        {
            $count = $count + 1;
            ?></b><h2>Auteur <br> <?php echo $comment['pseudo']; ?> </h2>
            Contenu <br>
            <?php echo($comment['content']); ?> <br><p> <?php
        }
    }
    if ($count == 0) {
        echo 'pas encore de commentaire' ;
    }
}




?>

<section class="signup-form">
    <h2>Ajouter un commentaire</h2>

    <form  method="post" action="" accept-charset="utf-8">
        <input type="text" name="content" placeholder="Texte"/><br>
        <input type="submit" value="Publier" name="submit" />
    </form>
</section>
</body>



</body>
</html>