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
    require '../app/models/model.php';
    require '../app/views/blog_single.view.php';
}
