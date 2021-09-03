
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



// Récupération des commentaires


?>


<?php
// Fin de la boucle des commentaires

foreach($post_comments as $key => $comment) {
$com_id = $comment['comment_id'];
$req = $pdo->prepare("SELECT * FROM comments WHERE id = ? ");
$req->execute(array($com_id));
$comments_data = $req->fetch();

?></b><h2>Auteur <br> <?php echo $comments_data['pseudo']; ?> </h2>
<p>Titre <br><?php echo($comments_data['title']); ?> <br><br>Contenu <br>
<?php echo($comments_data['content']); ?> <br><p> <?php

}

?>
</body>



</body>
</html>