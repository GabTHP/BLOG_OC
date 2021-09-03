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
                                     

?>