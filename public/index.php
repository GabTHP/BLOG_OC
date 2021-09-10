<?php

// autoload

require '../vendor/autoload.php';

require '../app/controllers/controller.php';

require '../app/controllers/adminController.php';

require '../app/controllers/userController.php';

require '../app/controllers/postController.php';


// Active mode débug





$url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);



    if(isset($url)) {
        $url=explode('/', $url );
    }
    if ($url[0] == '') {
        home();
    }
    elseif ($url[0] == 'blog_all') {
        blog_all();
    }
    elseif ($url[0] == 'post' AND !empty($url[1])) {
        $idPost = $url[1];
        blog_single();
    }
    elseif ($url[0] =='sign_in') {
        sign_in();
    }
    elseif ($url[0] =='sign_up') {
        sign_up();
    }
    elseif ($url[0] == 'users_all') {
        session_start();
        if (isset($_SESSION['role']) && ($_SESSION['role'])=='Admin') {
            users_all();
        }
        else {
            error404();
        } 
    }
    elseif ($url[0] == 'profile') {
        session_start();
        if (isset($_SESSION['username'])) {
            profile();
        }
        else {
            error404();
        }
          
    }
    elseif ($url[0] == 'profile_edit') {
        session_start();
        if (isset($_SESSION['username'])) {
            profile_edit();
        }
        else {
            error404();
        }
          
    }

    elseif ($url[0] == 'logout') {
        session_start();
        session_destroy();
    }
    
    elseif ($url[0] == 'user' AND !empty($url[1])) {
        $idUser = $url[1];
        user_single();
    }
    else {
        error404();
    } 

// dans la fonction controlleur configurer l'id

//switch ($uri) {

//case "":
//home();
//break;

//case "blog_all":
//blog_all();
//break;

//case "blog_single/":
//    blog_single();
//    echo 'jexiste';
//    break;

//default :
//error404();
//break;

//}


//$url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);

//$router = new AltoRouter();

// Map  Routes

//$router->map('GET', '/', 'index', 'index');
//$router->map('GET', '/404', '404', '404');

// Match Routes

//$match = $router->match();


//if( is_array($match)) {
  //  if( is_callable( $match['target'] ) ) {
    //    call_user_func_array( $match['target'], $match['params'] ); 
//    } else {
 //       $params = $match['params'];
  //      // match target with view
  //      // no route was matched
 //       include "../app/views/{$match['target']}.view.php";
  //  }
//} else {
 //   require "../app/views/404.view.php";
//}
