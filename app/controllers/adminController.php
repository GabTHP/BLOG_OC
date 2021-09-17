<?php
 require '../app/models/userModel.php';
 
function users_all()
{
   
    $all_users = get_all_users();
    require '../app/views/adminUserAll.view.php';
    require '../app/db/connDb.php';

    if(isset($_POST['delete'])) 
    {
        $id = $_POST['id'];
        $pdo->exec("DELETE FROM users WHERE id = '{$id}' ") ;

        ?>
        <script type="text/javascript">
        window.alert("L'utilisateur a été supprimé")
        </script>
        <?php
    }
    
    if(isset($_POST['validate'])) 
    {
        $id = $_POST['id'];
        $pdo->exec("UPDATE `users` SET is_valid = 1 WHERE `users`.`id` = '{$id}'");

        ?>
        <script type="text/javascript">
        window.alert("L'utilisateur a été validé")
        </script>
        <?php
    }
    if(isset($_POST['Update_Role'])) {
        $id = $_POST['id'];
        $role =  $_POST['role'];
        $pdo->exec("UPDATE `users` SET role = 1 WHERE `users`.`id` = {$id}");
    }

}

function comment_validation()
{
    
}
