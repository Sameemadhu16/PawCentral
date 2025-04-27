<?php

if (php_sapi_name() == "cli") {
    // CLI - Command Line Interface
    define('ROOT', 'http://localhost/PawCentral/public');
    define('ROOT1', 'http://localhost/PawCentral');
} else {
    // Web server (browser) environment
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        define('ROOT', 'http://localhost/PawCentral/public');
        define('ROOT1', 'http://localhost/PawCentral');
    } else {
        define('ROOT', 'https://www.pawcentral.com');  // your production site
    }
}

// Database Config
define('DBNAME', 'sam');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', '');

// Application Info
define('APP_NAME', "My website");
define('APP_DESC', "this is best website in world");

// Debug mode (true means show errors)
define('DEBUG', true);
