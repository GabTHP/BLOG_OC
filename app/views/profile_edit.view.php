<div class="jumbotron p-5 text-center">
    <h1>Mise à jour Profil</h1>
</div>

<div class="container p-5">
    <a href="/Blog_Oc/profile">
        <p class="text-muted"> Revenir sur mon profil <p>
    </a>
    <div class="signup-form">
        <h2>Mettre à Jour mon profil :</h2>

        <form method="post" action="" accept-charset="utf-8">
            <div class="form-group">
                <p>Pseudo : <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" />
            </div>
            <div class="form-group">
                <p>Email : <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" />
            </div>
            <input type="submit" class="btn btn-primary" value="Valider" name="Valider" />
        </form>
        <br><br>
        <h2>Changer mon mot de passe :</h2>

        <form method="post" action="" accept-charset="utf-8">
            <div class="form-group">
                <p>Nouveau mot de passe : <input type="text" class="form-control" name="password" />
            </div>
            <div class="form-group">
                <p>Confirmer le mot de passe : <input type="text" class="form-control" name="confirm_password" />
            </div>
            <input type="submit" class="btn btn-primary" value="Confirmer" name="submit_mdp" />
        </form>

    </div>
</div>

<?php include '../app/views/footer.view.php'; ?>












?>