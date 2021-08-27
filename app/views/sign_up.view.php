<?php require '../app/db/connDb.php';
session_start();
?>



<section class="signup-form">
    <h2>Sign UP</h2>

    <form  method="post" action="sign_up">
        <input type="text" name="username" placeholder="username"/>
        <input type="text" name="email" placeholder="email"/>
        <input type="password" name="password" placeholer="password"/>
        <input type="submit" value="Valider" name="submit" />
    </form>
</section>



<?php

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

                                     

?>