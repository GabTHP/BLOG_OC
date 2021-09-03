<?php

function users_all()
{
    require '../app/models/model.php';
    $all_users = get_all_users();
    require '../app/views/adminUserAll.view.php';
    require '../app/db/connDb.php';
    if(isset($_POST['delete'])) 
    {
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0;") ;   
	$pdo->exec("DELETE FROM `users` WHERE `users`.`id` = {$user_id}") ;
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1;") ;  
    ?>
    <script type="text/javascript">
    window.alert("L'utilisateur a été supprimé")
    </script>
    <?php
    }
    
    if(isset($_POST['validate'])) 
    {
	$pdo->exec("UPDATE `users` SET is_valid = 1 WHERE `users`.`id` = {$user_id}");

    ?>
    <script type="text/javascript">
    window.alert("L'utilisateur a été validé")
    </script>
    <?php



 }
}

function user_single()
{
    require '../app/views/default.layout.view.php';
    require '../app/models/model.php';
    $user = get_one_user();
    require '../app/views/adminUserSingle.view.php';
}