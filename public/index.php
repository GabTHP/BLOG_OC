<?php

// autoload

require '../vendor/autoload.php';

require '../app/controllers/controller.php';

require '../app/controllers/adminController.php';

require '../app/controllers/userController.php';

require '../app/controllers/postController.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);



if (isset($url)) {

    $url = explode('/', $url);
}
if ($url[0] == '') {
    home();
} elseif ($url[0] == 'blog_all') {
    session_start();
    blog_all();
} elseif ($url[0] == 'post' and !empty($url[1])) {
    $idPost = $url[1];
    session_start();
    blog_single();
} elseif ($url[0] == 'edit_post' and !empty($url[1])) {
    $idPost = $url[1];
    session_start();
    if (isset($_SESSION['role']) && ($_SESSION['role']) == 'Admin') {
        post_edit();
    } else {
        error404();
    }
} elseif ($url[0] == 'post_create') {
    session_start();
    if (isset($_SESSION['role']) && ($_SESSION['role']) == 'Admin') {
        post_create();
    } else {
        error404();
    }
} elseif ($url[0] == 'sign_in') {
    session_start();
    if (isset($_SESSION['username'])) {
        $newURL = 'blog_all/';
        header('Location: ' . $newURL);
    } else {
        sign_in();
    }
} elseif ($url[0] == 'sign_up') {
    session_start();
    if (isset($_SESSION['username'])) {
        $newURL = 'blog_all/';
        header('Location: ' . $newURL);
    } else {
        sign_up();
    }
} elseif ($url[0] == 'users_all') {
    session_start();
    if (isset($_SESSION['role']) && ($_SESSION['role']) == 'Admin') {
        users_all();
    } else {
        error404();
    }
} elseif ($url[0] == 'profile') {
    session_start();
    if (isset($_SESSION['username'])) {
        profile();
    } else {
        error404();
    }
} elseif ($url[0] == 'profile_edit') {
    session_start();
    if (isset($_SESSION['username'])) {
        profile_edit();
    } else {
        error404();
    }
} elseif ($url[0] == 'dashboard') {
    session_start();
    if (isset($_SESSION['role']) && ($_SESSION['role']) == 'Admin') {
        dashboard();
    } else {
        error404();
    }
} elseif ($url[0] == 'logout') {
    session_start();
    if (session_destroy()) {
        session_destroy();
        $newURL = '/Blog_Oc';
        header('Location: ' . $newURL);
    }
} else {
    error404();
}
