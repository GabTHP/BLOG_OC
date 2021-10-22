<div class="jumbotron p-5 text-center">
    <h1>Inscrivez-vous et participer aux discussions ! </h1>
</div>

<div class="container p-5">
    <a href="/Blog_Oc/">
        <p class="text-muted"> Retour à l'accueil<p>
    </a>

    <div class="signup-form">
        <h3> M'inscrire :</h3>
        <div style="min-height:450px;">
            <form form method="post" action="sign_up">
                <div class="form-group">
                    <label for="username">Pseudo :</label>
                    <input type="text" class="form-control" name="username" required><br>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" required><br>
                </div>
                <div class="form-group">
                    <label for="password">Mot de Passe :</label>
                    <input type="password" class="form-control" name="password" required><br>
                </div>
                <input class="btn btn-primary" type="submit" value="Valider" name="submit" />
            </form>
        </div>

    </div>
</div>
<?php include '../app/views/footer.view.php'; ?>