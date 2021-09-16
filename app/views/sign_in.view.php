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

