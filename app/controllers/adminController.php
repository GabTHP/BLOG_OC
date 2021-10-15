<?php
require '../app/models/userModel.php';

function users_all()
{

    $all_users = get_all_users();
    require '../app/views/adminUserAll.view.php';
    require '../app/db/connDb.php';

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $pdo->exec("DELETE FROM users WHERE id = '{$id}' ");

?>
        <script type="text/javascript">
            window.alert("L'utilisateur a été supprimé");
            window.location.href = "/Blog_Oc/users_all";
        </script>
    <?php
    }

    if (isset($_POST['validate'])) {
        $id = $_POST['id'];
        $pdo->exec("UPDATE `users` SET is_valid = 1 WHERE `users`.`id` = '{$id}'")

    ?>
        <script type="text/javascript">
            window.alert("L'utilisateur a été validé");
            window.location.href = "/Blog_Oc/users_all";
        </script>
    <?php
    }
    if (isset($_POST['Update_Role'])) {
        $id = $_POST['id'];
        $role =  $_POST['role'];
        $pdo->exec("UPDATE `users` SET role = 1 WHERE `users`.`id` = {$id}");
    }
    ?>
    <script type="text/javascript">
        window.alert("Le rôle de l'utilisateur a été mis à jour");
        window.location.href = "/Blog_Oc/users_all";
    </script>
    <?php
}

function dashboard()
{
    require '../app/models/postModel.php';
    $all_posts = get_all_posts();
    $count = 0;
    $count_comment = 0;
    $all_comments = get_all_comments();
    require '../app/views/dashboard.view.php';
    require '../app/db/connDb.php';

    if (isset($_POST['valid'])) {
        $id_post = $_POST['id'];
        $pdo->exec("UPDATE `posts` SET is_valid = 1 WHERE `posts`.`id` = {$id_post}");

    ?>
        <script type="text/javascript">
            alert("La publication a été validée");
            window.location.href = "/Blog_Oc/dashboard";
        </script>
    <?php
    }

    if (isset($_POST['delete_post'])) {
        $id_post = $_POST['id'];
        $pdo->exec("DELETE FROM posts WHERE `posts`.`id` = {$id_post}");

    ?>
        <script type="text/javascript">
            alert("La publication a été suprimée");
            window.location.href = "/Blog_Oc/dashboard";
        </script>
    <?php
    }

    if (isset($_POST['valid_comment'])) {
        $id_comment = $_POST['id'];
        $pdo->exec("UPDATE `comments` SET is_valid = 1 WHERE `comments`.`id` = {$id_comment}");
    ?>
        <script type="text/javascript">
            alert("Le commentaire a été validé");
            window.location.href = "/Blog_Oc/dashboard";
        </script>
    <?php
    }

    if (isset($_POST['delete_com'])) {
        $id_comment = $_POST['id'];
        $pdo->exec("DELETE FROM comments WHERE `comments`.`id` = {$id_comment}");
    ?>
        <script type="text/javascript">
            alert("Le commentaire a été supprimé");
            window.location.href = "/Blog_Oc/dashboard";
        </script>
<?php

    }
}
