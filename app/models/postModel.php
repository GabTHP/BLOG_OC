<?php


    // On récupère tout le contenu de la table posts
    
    $url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);
    $url=explode('/', $url );  

    function get_all_posts() {
        require '../app/db/connDb.php';
        $all_posts = $pdo->query('SELECT * FROM posts');
        return ($all_posts->fetchAll());
    }

    function get_one_post() {
        // Récupération du billet


        require '../app/db/connDb.php';
        $url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);
        $url=explode('/', $url );  
        $req = $pdo->prepare('SELECT * FROM posts WHERE id = ? ');
        $req->execute(array($url[1]));

        return($post = $req->fetch());
    }

    


    function get_comments() {
        require '../app/db/connDb.php';
        $url = str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);
        $url=explode('/', $url );  
        $req = $pdo->prepare('SELECT * FROM comments WHERE post_id = ? ');
        $req->execute(array($url[1]));
        return ($comments = $req->fetchAll());
    }

    function get_all_comments() {
        require '../app/db/connDb.php';
        $all_comments = $pdo->query('SELECT * FROM comments');
        return ($all_comments->fetchAll());
    }
    

    



 

  


