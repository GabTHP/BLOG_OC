<?php

function get_all_users() {
        require '../app/db/connDb.php';
        $all_users = $pdo->query('SELECT * FROM users');

        return ($all_users->fetchAll());
    }

function get_one_user() {
    // Récupération d'un user


    require '../app/db/connDb.php';
    $url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);
    $url=explode('/', $url );  
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ? ');
    $req->execute(array($url[1]));

    return($post = $req->fetch());
}