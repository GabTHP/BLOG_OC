<div class="jumbotron p-5 text-center">
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
</div>

<div class="container p-5">

    <section class="signup-form">
        <h2>Mettre à Jour la publication :</h2>

        <form method="post" action="" accept-charset="utf-8">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" placeholder="<?php echo $post['title'] ?>" /><br>
            </div>
            <div class="form-group">
                <label for="text">Contenu:</label>
                <textarea type="textarea" style="min-height:150px;" class="form-control" name="content" value="<?php echo $post['content'] ?>"> <?php echo $post['content'] ?></textarea><br>
            </div>
            <p>Mettre à jour l'illustration</p>
            <input class="form-control" type="file" name="featured_image"><br>
            <input type="submit" class="btn btn-primary" value="Mettre à jours" name="update" />
        </form>

</div>

<?php include '../app/views/footer.view.php'; ?>