<div class="jumbotron p-5 text-center">
    <h1>Connecter vous à votre compte</h1>
</div>

<div class="container p-5">
    <a href="/Blog_Oc/">
        <p class="text-muted"> Retour à l'accueil<p>
    </a>

    <div class="signup-form">
        <h3> Connexion :</h3>
        <div style="min-height:450px;">
            <form action="sign_in" method="post">
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" name="email" /><br>
                </div>
                <div class="form-group">
                    <label for="password">Mot de Passe :</label>
                    <input type="password" class="form-control" name="password"><br>
                </div>
                <input class="btn btn-primary" type="submit" value="Se connecter" name="submit" />
                <br>
                <p> Vous n'avez pas encore de compte ? <a href="/Blog_Oc/sign_up">Cliquez ici</a>
            </form>
        </div>

    </div>
</div>
<?php include '../app/views/footer.view.php'; ?>