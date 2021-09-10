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




