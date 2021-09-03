
<?php

require '../app/db/connDb.php';

if(isset($_POST['submit'])) 
 {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date("Y-m-d H:i:s");

	$pdo->exec("INSERT INTO users 
		    SET username='{$username}',
		    	password='{$password}',
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
