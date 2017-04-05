<?php


class Router
{

    public static function route()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        $uri = trim($uri, '/');
        $uriFragments = explode('/', $uri);

        $controllerName = 'ControllerBase';
        if (!empty($uriFragments[1])) {
            $controllerName = $uriFragments[1];
            $controllerName = ucfirst($controllerName);
            $controllerName = 'Controller' . $controllerName;
        }

        $method = 'index';
        if (!empty($uriFragments[2])) {
            $method = $uriFragments[2];
        }

        $args = array_slice($uriFragments, 3);

        require_once "controller/$controllerName.php";

        $controller = new $controllerName();
        $controller->$method();
    }
}
