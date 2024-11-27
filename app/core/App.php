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
        
        // Check for dynamic routes with parameters
        foreach($existsRoutes as $route => $handler) {
            $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            if(preg_match('/^' . $pattern . '$/', $routeValue, $matches)) {
                array_shift($matches); // Remove the full match
                $params = [];
                
                // Extract parameter names from route
                preg_match_all('/\{([^}]+)\}/', $route, $paramNames);
                
                // Combine parameter names with values
                foreach($paramNames[1] as $index => $name) {
                    $params[$name] = $matches[$index] ?? null;
                }
                
                // Load the controller
                $routeData = $handler;
                $filename = "../app/controllers/" . trim($routeData['class'], '/') . ".php";
                $className = basename($filename, ".php");
                $functionName = trim($routeData['function']);
                
                if (file_exists($filename)) {
                    require $filename;
                    $controller = new $className();
                    call_user_func([$controller, $functionName], $params);
                    return;
                }
            }
        }
        
        // 404 handling
        $filename = "../app/controllers/_404.php";
        require $filename;
        $this->controller = "_404";
        $controller = new $this->controller();
        call_user_func([$controller, 'index']);
    }
}
