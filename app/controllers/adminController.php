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
            window.alert("L'utilisateur a été supprimé")
        </script>
    <?php
    }

    if (isset($_POST['validate'])) {
        $id = $_POST['id'];
        $pdo->exec("UPDATE `users` SET is_valid = 1 WHERE `users`.`id` = '{$id}'");

    ?>
        <script type="text/javascript">
            window.alert("L'utilisateur a été validé")
        </script>
<?php
    }
    if (isset($_POST['Update_Role'])) {
        $id = $_POST['id'];
        $role =  $_POST['role'];
        $pdo->exec("UPDATE `users` SET role = 1 WHERE `users`.`id` = {$id}");
    }
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
        echo 'post validé';
    }

    if (isset($_POST['valid_comment'])) {
        $id_comment = $_POST['id'];
        $pdo->exec("UPDATE `comments` SET is_valid = 1 WHERE `comments`.`id` = {$id_comment}");
        echo 'commentaire validé';
    }

    if (isset($_POST['delete_com'])) {
        $id_comment = $_POST['id'];
        $pdo->exec("DELETE FROM comments WHERE `comments`.`id` = {$id_comment}");
        echo 'commentaire validé';
    }
}
