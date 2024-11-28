<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';

    // split the routing path
    private function splitURL()
    {
        // $URL = $_GET["url"] ?? 'home';
        // $URL = explode("/", $URL);
        // return $URL;
        $URL = $_GET["url"] ?? 'home';
        //$URL = explode("/", $URL);
        return $URL;
    }


    // router path split files name, find the server if not included then, load the 404 file 
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
