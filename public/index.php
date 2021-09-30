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
        session_start();
        blog_all();
    }
    elseif ($url[0] == 'post' AND !empty($url[1])) {
        $idPost = $url[1];
        session_start();
        blog_single();
    }
    elseif ($url[0] == 'post_create') {
        session_start();
        post_create();
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

        
    elseif ($url[0] == 'dashboard') {
        session_start();
        dashboard();

    
    }

    elseif ($url[0] == 'logout') {
        session_start();
        session_destroy();
    }

    else {
        error404();
    } 

