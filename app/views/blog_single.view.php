<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 
<?php
// Connexion à la base de données
require '../app/db/connDb.php';

// Récupération du billet
$req = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$req->execute(array($_GET['post']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['title']); ?>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['content']));
    ?>
    </p>
</div>
</body>
</html>