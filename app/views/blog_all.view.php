<div class="jumbotron p-5">
  <h1 class=text-center>Bienvenue sur mon Blog !</h1>
  <p class=text-center>Découvrez toutes les publications sur l'univers du développement Web</p>
</div>


<div class="container">

  <?php
  if (isset($_SESSION['role']) and $_SESSION['role'] == 'Admin') {
  ?>
    <div class="text-center">
      <br><br><a class="btn btn-primary" href="/Blog_Oc/post_create">Créer un nouvel article</a>
    </div>
    <?php
  }
  // On affiche chaque publicaion une à une
  foreach ($all_posts as $key => $post) {

    if ($post['is_valid'] == 1) {
    ?>


      <article class="article m-5">
        <div class="article-box">
          <img src="public/assets/img/upload/<?php echo $post['featured_image'] ?>" width="1500" height="1368" alt="<?php echo $post['featured_image'] ?>">
        </div>
        <div class=" p-3">
          <h1><a href="/Blog_Oc/post/<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a></h1>
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
            }
            echo $chapo;
            ?>
          </p>
          <a href="/Blog_Oc/post/<?php echo $post['id'] ?>"><button class="btn btn-primary">Lire l'article</button></a><br><br>

          <?php
          if ($post['updated_at'] == null) {
          ?>

            <p>Crée le <?php echo $post['created_at'];
                      } else {
                        ?>
            </p>
            <p>Dernière mise à jour le <?php echo $post['updated_at'];
                                      }
                                        ?>
            </p>
            <?php
            $querry = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
            $querry->execute(array($post['user_id']));
            $user = $querry->fetch();
            ?>
            <p>Auteur : <?php echo $user['username']; ?></p>
            <?php if (isset($_SESSION['role']) and $_SESSION['role'] == 'Admin') {
            ?>
              <p><b> Gérer l'article : </b></p>
              <form method="post" action="blog_all">
                <input name="id" type="hidden" value="<?php echo $post['id'] ?>" placeholder="<?php echo $post['id'] ?>">
                <input style="color:white;" class="btn btn-danger" type="submit" name="delete" value="Supprimer">
                <a class="text-white btn btn-warning" href=/Blog_Oc/edit_post/<?php echo $post['id']; ?>>
                  Modifier
                </a>
              </form>
            <?php
            }
            ?>
      </article>
  <?php
    }
  }
  ?>
</div>





<?php include '../app/views/footer.view.php'; ?>
</body>

</html>