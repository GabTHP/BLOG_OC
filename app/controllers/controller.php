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
    //if $post not null alors tu fais bla bla
    $post_comments = get_comments();
    require '../app/views/blog_single.view.php';

    // Faire passer l'id du comment dans la fonction get_comments
    //
}
