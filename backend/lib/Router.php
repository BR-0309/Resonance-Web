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

        try {
            require_once "controller/$controllerName.php";
        } catch (Exception $e) {
            Util::returnMessage(404, "Controller not found");
        }
        $controller = new $controllerName();
        try {
            $controller->$method();
        } catch (Exception $e) {
            Util::returnMessage(404, "Action not found");
        }
    }
}
