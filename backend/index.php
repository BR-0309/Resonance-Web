<?php
function handleError($exception)
{
    echo '{
                "error": {
                    "code": 404,
                    "message": "Action not found"
                 }
           }';
    exit(1);
}

set_error_handler('handleError');
require_once 'lib/Dispatcher.php';
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
