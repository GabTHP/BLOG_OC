<head>
<meta charset="utf-8" />
</head>



<section class="signup-form">
    <h2>Modifier le post</h2>

    <form  method="post" action="" accept-charset="utf-8">
        <p>titre</p>
        <input type="text" name="title" value="<?php echo $post['title'] ?>" placeholder="<?php echo $post['title'] ?>"/><br>
        <p>texte</p>
        <input type="text" name="content" value="<?php echo $post['content'] ?>"/><br>
        <p>Mettre à jour l'illustration</p>
        <input type="file" name="featured_image"><br>
        <input type="submit" value="update" name="update" />
    </form>
</section>