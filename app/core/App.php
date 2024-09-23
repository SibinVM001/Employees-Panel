<?php

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        $routes = require '../routes/web.php'; // Load routes from the configuration file

        // Check if $url[0] exists and is set in the routes
        if (!empty($url[0]) && isset($routes[$url[0]])) {
            $route = $routes[$url[0]];
            $this->controller = $route[0];
            $this->method = $route[1];
            unset($url[0]);
        } else {
            // Handle case where route is not defined (e.g., show 404 page)
            $this->controller = 'ErrorController';
            $this->method = 'notFound';
        }

        // Require controller file
        $controllerFile = '../app/controllers/' . $this->controller . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $this->controller = new $this->controller;
        } else {
            // Handle case where controller file does not exist
            die("Controller file not found.");
        }

        // Check if method exists
        if (method_exists($this->controller, $this->method)) {
            $this->params = !empty($url) ? array_values($url) : [];
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            // Handle case where method does not exist
            die("Method not found.");
        }
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}