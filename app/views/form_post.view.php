<div class="jumbotron p-5 text-center">
    <h1>Créer un nouvel article</h1>
</div>

<div class="container p-5">
    <a href="/Blog_Oc/blog_all">
        <p class="text-muted"> Retour <p>
    </a>

    <div class="signup-form">
        <h2>Créer une publication :</h2>

        <form method="post" action="post_create" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" name="title" /><br>
            </div>
            <div class="form-group">
                <label for="text">Contenu:</label>
                <textarea type="textarea" style="min-height:150px;" class="form-control" name="content"></textarea><br>
            </div>
            <p>Mettre à jour l'illustration (format acceptés jpg, jpeg, png)</p>
            <input class="form-control" type="file" name="featured_image"><br>
            <input type="submit" class="btn btn-primary" value="Enregistrer" name="submit" />
        </form>


    </div>
</div>
<?php include '../app/views/footer.view.php'; ?>