<?php
require_once 'Util.php';
function handleError($exception)
{
    Util::returnMessage(500, "Unknown error occurred");
}

set_error_handler('handleError');
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
require_once 'lib/Router.php';
$router = new Router();
$router->route();
