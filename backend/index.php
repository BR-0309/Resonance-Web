<?php
function handleError($exception)
{
    echo '{
                "error": {
                    "code": 404,
                    "message": "Unknown error occured"
                 }
           }';
    //exit(1);
}
set_error_handler('handleError');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'lib/Router.php';
$router = new Router();
$router->route();
