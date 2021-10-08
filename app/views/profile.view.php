<div class="jumbotron p-5 text-center">
    <h1> Mon Profil </h1>
</div>

<div class="container p-5" style="min-height:600px;">
    <a href="/Blog_Oc/blog_all">
        <p class="text-muted"> Revenir sur le blog <p>
    </a>
    <h3 class="">Les informations de mon profil :</h3>

    <p>Pseudo : <?php echo $_SESSION['username']; ?></p>
    <p>Email : <?php echo $_SESSION['email']; ?></p>
    <p>Role : <?php echo $_SESSION['role']; ?></p>
    <p>Statut du compte : <?php if ($_SESSION['is_valid'] == 1) {
                                echo "Validé";
                            } else {
                                echo "En attente de validation";
                            } ?>
    </p>
    <form method="post" action="">
        <input name="id" type="hidden" value="<?php echo $id ?>" placeholder="<?php echo $id ?>">
        <input type="submit" class="btn btn-danger" name="delete" value="Supprimer mon Compte"> <a href="/Blog_Oc/profile_edit" class="btn btn-primary"> Modifier mon profil </a>
    </form>
</div>

<?php include '../app/views/footer.view.php'; ?>