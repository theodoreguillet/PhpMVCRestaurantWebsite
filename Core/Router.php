<?php

require_once "View.php";

/**
 * Routes du site
 */
class Router
{
    private static $pathname = "";
    private static $controller = "";
    private static $action = "";
    private static $params = [];

    public static function getPathname() {
        return self::$pathname;
    }
    public static function getController() {
        return self::$controller;
    }
    public static function getAction() {
        return self::$action;
    }
    public static function getParams() {
        return self::$params;
    }

    /**
     * Redirige vers une page
     */
    public static function redirect($page)
    {
        header("Location: $page");
        exit();
    }

    /**
     * Gère le routage de la page vers le bon controlleur
     */
    public static function route()
    {
        try {
            if(self::parseRoute()) {
                $controller = self::$controller;
                $action = self::$action;
                $params = self::$params;

                $controllerFile = dirname(__DIR__) . "/Controllers/$controller.php";
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    if(!class_exists($controller)) {
                        throw new Exception("Controller must contain controller class");
                    }

                    $controllerObj = new $controller($params);

                    $methodAction = $action . self::formatUcWords($_SERVER['REQUEST_METHOD']);
                    if(method_exists($controllerObj, $methodAction)) {
                        $controllerObj->$methodAction();
                        return true;
                    } else if(method_exists($controllerObj, $action)) {
                        $controllerObj->$action();
                        return true;
                    }
                }
            }
            View::render("404");
        } catch(Exception $e) {
            View::render("500", [ "exception" => $e ]);
        }
        return false;
    }

    /**
     * Extrait la route de l'url courrante
     */
    private static function parseRoute() {
         // url de la forme /controlleur/action/id
        $regex = '/^(?P<controller>[a-z-]+)?\\/?(?P<action>[a-z-]+)?\\/?(?P<id>[a-z-]+)?\\/?$/i';
        $url = self::removeUrlQuery($_SERVER['QUERY_STRING']);

        self::$pathname = $url;
        self::$controller = null;
        self::$action = null;
        self::$params = array_merge($_GET, $_POST);

        if(!preg_match($regex, $url, $matches)) {
            return false;
        }
        if(isset($matches["id"])) {
            self::$params["id"] = $matches["id"];
        }

        self::$controller = "IndexController";
        self::$action = "IndexAction";
        if(isset($matches["controller"])) {
            self::$controller = self::formatUcWords($matches["controller"]) . "Controller";
        }
        if(isset($matches["action"])) {
            self::$action = self::formatUcWords($matches["action"]) . "Action";
        }

        return true;
    }

    /**
     * Supprime les arguments de l'url
     */
    private static function removeUrlQuery($url) {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * Met le début des mots en majuscule
     */
    private static function formatUcWords($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
}
