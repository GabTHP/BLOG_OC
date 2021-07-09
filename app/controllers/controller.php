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
   echo 'ici tous les articles du blogs seront' ;
}

function blog_single()
{
    echo 'ici un seul article de blg sera';
}
