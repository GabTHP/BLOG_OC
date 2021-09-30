<?php
// On affiche chaque entrée une à une
foreach($all_posts as $key => $post) {
    ?><h1><?php echo $post['title']; ?></h1><br>
    
    <?php
    if ($post['updated_at'] == null) {
      ?> <p>Dernière modification le <?php echo $post['created_at'];
    }
    else {
      ?> <p>Dernière modification le <?php echo $post['updated_at'];
    }
    ?>

    <a href="/Blog_Oc/post/<?php echo $post['id']?>">Consulter la publication</a>

    <?php if ($_SESSION['role'] == 'Admin') {
      ?> 
      <form method="post" action="blog_all" >
        <input  name="id" type="hidden" value="<?php echo $post['id'] ?>" placeholder="<?php echo $post['id'] ?>">
        <input type="submit" name="delete" value="delete">
      </form>

    <?php 
  }

}
