<?php
try {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    echo "hi";
    require_once 'lib/Dispatcher.php';
    $dispatcher = new Dispatcher();
    $dispatcher->dispatch();
} catch(Exception $e) {
    echo $e-getMessage();
}
