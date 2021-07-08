<?php

// autoload

require '../vendor/autoload.php';

require '../app/controllers/controller.php';

$uri= str_replace("/Blog_Oc/", "", $_SERVER["REQUEST_URI"]);

switch ($uri) {

case "":

require '../app/views/default.layout.view.php';
require '../app/views/index.view.php';
break;

case "contact":
contact();
break;

default :
error404();
break;

}
?>
