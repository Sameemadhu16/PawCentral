<?php
class Authentication {
    private static $instance = null;

    // ... (previous methods remain the same)

    public function parseUrlParams($requestUri) {
        $parsedUrl = parse_url($requestUri);
        $params = [];

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $params);
        }

        return $params;
    }
}

function authenticatedRoute($url, $classData, $roles = []) {
    $auth = Authentication::getInstance();
    
    // Extract base URL without query parameters
    $requestUri = $_SERVER['REQUEST_URI'];
    $parsedRequestUrl = parse_url($requestUri);
    $requestPath = $parsedRequestUrl['path'];

    // Extract base URL from the defined route
    $parsedDefinedUrl = parse_url($url);
    $definedPath = $parsedDefinedUrl['path'];

    // Check if the request path matches the defined route path
    if (strpos($requestPath, $definedPath) === 0) {
        // Require authentication for specific roles
        if (!empty($roles)) {
            $auth->requireLogin($roles);
        }

        $classDataArray = explode('@', $classData);
        $class = $classDataArray[0];
        $function = isset($classDataArray[1]) ? $classDataArray[1] : 'index';

        // Parse URL parameters
        $urlParams = $auth->parseUrlParams($requestUri);

        // Pass query parameters to the controller
        $params = ['id' => $urlParams];

        // Dispatch the route
        $controllerClass = new $class();
        call_user_func_array([$controllerClass, $function], [$params]);
        exit();
    }
}

// Helper function for admin routes
function protectedAdminRoute($url, $classData) {
    authenticatedRoute($url, $classData, ['admin']);
}