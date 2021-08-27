<?php

// autoload

require '../vendor/autoload.php';

require '../app/controllers/controller.php';

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
    elseif ($url[0] =='cible.php') {
        require '../app/views/cible.php';
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
