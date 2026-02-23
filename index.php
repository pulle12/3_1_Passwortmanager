<?php

require_once('controller/Controller.php');

// http://localhost/php/3_1_Passwortmanager/index.php?r=credentials/index
// http://localhost/php/3_1_Passwortmanager/index.php?r=credentials/update&id=25

$route = isset($_GET['r']) ? explode('/', trim($_GET['r'])) : ['credentials'];
$controller = sizeof($route) > 0 ? $route[0] : 'credentials';

if($controller == 'credentials'){

} else {
    Controller::showError("Page not found", "Page for operation " . $controller . " was not found!", 404);
}




