<?php



function home()
{
    require '../app/views/default.layout.view.php';
    require '../app/views/index.view.php';
}

function error404()
{
    echo "page non trouvé" ;
}

function blog_all()
{
    require '../app/models/model.php';
    $all_posts = get_all_posts();
    require '../app/views/blog_all.view.php';
}

function blog_single()
{
    require '../app/views/default.layout.view.php';
    require '../app/models/model.php';
    $post = get_one_post();
    $post_comments = get_comments();
    require '../app/views/blog_single.view.php';
}

function sign_in()
{
    require '../app/views/sign_in.view.php';
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

}

function sign_up()
{
    require '../app/views/sign_up.view.php';
}

