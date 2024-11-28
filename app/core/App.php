<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';
    private $params = []; // Array to store dynamic parameters

    // Split the routing path
    private function splitURL()
    {
        $URL = $_GET["url"] ?? 'home'; // Get URL from query string
        $URL = explode("/", filter_var(trim($URL, "/"), FILTER_SANITIZE_URL)); // Clean and split the URL
        return $URL;
    }

    // Load the controller and method
    public function loadController()
    {
        $existsRoutes = $GLOBALS['router'];
        $URL = $this->splitURL();
        $routeValue = implode("/", $URL);

        if (isset($existsRoutes[$routeValue])) {
            $routeData = $existsRoutes[$routeValue];
            // Get controller and method from routing configuration
            $filename = "../app/controllers/" . trim($routeData['class'], '/') . ".php";
            $className = basename($filename, ".php");
            $functionName = trim($routeData['function']);
            if (file_exists($filename)) {
                require $filename;
                $this->method = $functionName;
                $this->controller = ucfirst($className);
            }
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        // Instantiate the controller
        $controller = new $this->controller;

        // Extract parameters from the query string
        $this->params = $_GET;

        // Call the method with parameters
        if (method_exists($controller, $this->method)) {
            call_user_func_array([$controller, $this->method], [$this->params]);
        } else {
            echo "Method '{$this->method}' not found in controller '{$this->controller}'.";
        }
    }
}
