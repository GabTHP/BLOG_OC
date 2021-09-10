<?php

function sign_up()
{
    require '../app/views/sign_up.view.php';
    require '../app/db/connDb.php';
    if(isset($_POST['submit'])) 
 {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    $date = date("Y-m-d H:i:s");

	$pdo->exec("INSERT INTO users 
		    SET username='{$username}',
		    	password='{$hash_password}',
		    	slug='{$username}',
		    	email='{$email}',
		    	role = 'Subscriber',
		    	created_at='{$date}',
		    	is_valid = False
		    	");
	$users[] = $pdo->lastInsertId();

echo 'users created';

 }

}

function sign_in()
{
    require '../app/db/connDb.php';
    require '../app/views/sign_in.view.php';
    if(isset($_POST['email']) && isset($_POST['password'])) 
 {
    if (!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $req = $pdo-> prepare ("SELECT * FROM users WHERE email= :email");
        $req-> execute(array(
            'email'=> $email
        ));

        $user= $req->fetch();
            if  ($user) { $psw = $user['password'];
                    if (password_verify($password, $psw))
                        {
                        echo 'Utilisateur Correct';
                        $_SESSION['email'] = $email;
                        $_SESSION['role'] = $user['role'];
                        $_SESSION['is_valid'] = $user['is_valid'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['id'] = $user['id'];
                        }
                    else {
                        echo "mauvais mot de passe";
                    }
                }

            $req->closeCursor();
    }
    else {
        echo 'Merci de renseigner un mot de passe et un email pour se connecter';
    }
 }
}

function profile()
{
    require '../app/db/connDb.php';
    require '../app/views/profile.view.php';
}

function profile_edit()
{
    require '../app/db/connDb.php';
    require '../app/views/profile_edit.view.php';
    $user_id = $_SESSION['id'];

    if(isset($_POST['Valider'])) {
        $username =  $_POST['username'];
        $email = $_POST['email'];
        $_SESSION['username'] = $username;


	$pdo->exec("UPDATE `users` SET username = '{$username}', slug = '{$username}', email = '{$email}' WHERE `users`.`id` = {$user_id}");
    }

    if(isset($_POST['submit_mdp'])) {
        $password =  $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

            $pdo->exec("UPDATE `users` SET password = '{$hash_password}' WHERE `users`.`id` = {$user_id}");
            echo "mot de passe mis à jours";
        } 
        else {
            echo "les mots de passes doivent être identiques" ;
        }



    }
}   
