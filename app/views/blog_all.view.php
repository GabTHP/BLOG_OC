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
          <?php if ($post['featured_image'] == '') {
          ?>
            <img src="public/assets/img/devblog.jpg">
          <?php
          } else {
          ?>
            <img style="min-width:100%;" src="public/assets/img/upload/<?php echo $post['featured_image'] ?>" alt="<?php echo $post['featured_image'] ?>">
          <?php }
          ?>
        </div>
        <div class=" p-3" style="min-width:50%">
          <h1><a href="/Blog_Oc/post/<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a></h1>
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
          <a href="/Blog_Oc/post/<?php echo $post['id'] ?>"><button class="btn btn-primary">Lire l'article</button></a><br><br>

          <?php
          if ($post['updated_at'] == "0000-00-00 00:00:00") {
          ?>

            <p>Crée le <?php echo $post['created_at'];
                      } else {
                        ?>
            </p>
            <p>Crée le <?php echo $post['created_at'] ?>, dernière mise à jour le <?php echo $post['updated_at'];
                                                                                }
                                                                                  ?>
            </p>
            <?php
            $user = get_user_post($post['user_id']);
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