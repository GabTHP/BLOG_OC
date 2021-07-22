<?php

require '../app/db/connDb.php';

    // On récupère tout le contenu de la table posts
    
   

function get_all_posts() {

$all_posts = $pdo->query('SELECT * FROM posts');

return ($all_posts->fetchAll());
}

function get_one_posts() {
$one_post = $pdo->query('SELECT * FROM posts WHERE id = ? ');
return ($one_post->fetchAll());
}
    
    // On récupère le contenu d'un post

    
  


