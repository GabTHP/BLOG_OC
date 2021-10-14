<?php



function home()
{
    require '../app/views/default.layout.view.php';
    require '../app/views/index.view.php';
}

function error404()
{
    require '../app/views/404.view.php';
}
