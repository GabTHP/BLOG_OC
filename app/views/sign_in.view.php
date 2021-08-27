<?php 

session_start();

?>

<section class="signup-form">
    <h2>SignIN</h2>

    <form action="sign_in" method="post">
        <input type="text" name="email" placeholder="email"/>
        <input type="password" name="password" placeholer="password"/>
        <input type="submit" value="Valider" name="submit" />
    </form>
</section>

<?php

require '../app/db/connDb.php';



if(isset($_POST['email']) && isset($_POST['password'])) 
 {
    if (!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = password_verify($password, PASSWORD_BCRYPT);

        $req = $pdo-> prepare ("SELECT id FROM users WHERE email= :email AND password= :password");
        $req-> execute(array(
            'email'=> $email,
            'password'=> $hash_password));

        $result = $req->fetch();

            if (!$result)
                
            {
                echo 'pas de users avec ces infos';
            }

            else {
                echo 'user exist';
                $_SESSION['email'] = $email;
                echo $_SESSION['email'];
            }

            $req->closeCursor();
    }
    else {
        echo 'Merci de renseigner un mot de passe et un email pour se connecter';
    }
 }

 ?>
