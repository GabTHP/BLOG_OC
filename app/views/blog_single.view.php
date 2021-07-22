
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
$req = $pdo->prepare('SELECT * FROM comments WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));
$req->execute(array($url[1]));
while ($donnees = $req->fetch()) 
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();   
?>
</body>

<script src="public/assets/vendor/aos/aos.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>
  <script src="public/assets/vendor/purecounter/purecounter.js"></script>
  <script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/assets/vendor/typed.js/typed.min.js"></script>
  <script src="public/assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>
</html>