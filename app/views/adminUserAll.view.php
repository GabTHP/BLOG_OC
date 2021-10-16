<div class="jumbotron p-5 text-center">
    <h1>Inscrivez-vous et participer aux discussions ! </h1>
</div>

<div class="container p-5">

    <?php
    // On affiche chaque entrée une à une
    foreach ($all_users as $key => $user) {
    ?>
        <article class="article m-5">
            <div>
            </div>
            <div class="p-4">
                <h3 class="mb-0 text-primary"><?php echo $user['username']; ?></h3><br>
                <p><b> Email : </b><?php echo $user['email']; ?></p>
                <p><b> Rôle : </b><?php echo $user['role']; ?></p>
                <p><b>Statut :</b> <?php if ($_SESSION['is_valid'] == 1) {
                                        echo "Validé";
                                    } else {
                                        echo "En attente de validation";
                                    } ?>
                </p>
                <?php $id = $user['id'];
                if ($user['is_valid'] == 0) {
                ?>

                    <form method="post" action="users_all">
                        <input name="id" type="hidden" value="<?php echo $id ?>">
                        <input type="submit" class="btn btn-primary" name="validate" value="valider le compte">
                    </form>

                <?php
                }
                ?>


                <form method="post" action="users_all">
                    <input name="id" type="hidden" value="<?php echo $id ?>">
                    <select class="" name="role">
                        <option value="<?php echo $user['role'] ?>">Role actuel : <?php echo $user['role'] ?></option>
                        <option value="1">Admin</option>
                        <option value="2">Subscriber</option>
                    </select>
                    <input type="submit" name="Update_Role" class="btn btn-primary" value="Mettre à jour le rôle">
                </form>
                <br>
                <form method="post" action="users_all">
                    <input name="id" type="hidden" value="<?php echo $id ?>" placeholder="<?php echo $id ?>">
                    <input type="submit" name="delete" class="btn btn-danger" value="Supprimer le compte">
                </form>

            </div>
        </article>
    <?php } ?>
</div>
<?php include '../app/views/footer.view.php'; ?>