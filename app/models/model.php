<?php



    // On récupère tout le contenu de la table posts
    
   

    function get_all_posts() {
        require '../app/db/connDb.php';
        $all_posts = $pdo->query('SELECT * FROM posts');

        return ($all_posts->fetchAll());
    }

  


