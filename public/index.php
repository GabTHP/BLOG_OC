<?php

// autoload

require '../vendor/autoload.php';

require '../app/controllers/controller.php';

$uri= str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);


switch ($uri) {

case "":
home();
break;

case "blog_all":
blog_all();
break;

case "blog_single/":
    blog_single();
    echo 'jexiste';
    break;

default :
error404();
break;

}
?>
