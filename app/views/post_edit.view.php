<div class="jumbotron p-5 text-center">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
</div>

<div class="container p-5">
    <a href="/Blog_Oc/blog_all">
        <p class="text-muted"> Retour <p>
    </a>

    <section class="signup-form">
        <h2>Mettre à Jour la publication :</h2>
        <form method="post" action="" accept-charset="utf-8">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" placeholder="<?php echo $post['title'] ?>" required><br>
            </div>
            <div class="form-group">
                <label for="text">Contenu:</label>
                <textarea type="textarea" style="min-height:150px;" class="form-control" name="content" value="<?php echo $post['content'] ?>" required><?php echo $post['content'] ?></textarea><br>
            </div>
            <input type="submit" class="btn btn-primary" value="Mettre à jour" name="update" />
        </form>
        <br><br>
        <form method="post" action="" accept-charset="utf-8" enctype="multipart/form-data">
            <p>Mettre à jour l'illustration (format acceptés jpg, jpeg, png)</p>
            <input class="form-control" type="file" name="featured_image"><br>
            <input type="submit" class="btn btn-primary" value="Mettre à jour" name="update_image" />
        </form>
        <br><br>
        <p> illustration actuelle :</p>
        <img src="/Blog_Oc/public/assets/img/upload/<?php echo $post['featured_image'] ?>" max-width="500px" width="50%" alt="<?php echo $post['featured_image'] ?>">
    </section>
</div>

<?php include '../app/views/footer.view.php'; ?>