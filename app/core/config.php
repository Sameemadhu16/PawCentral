<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('ROOT','http://localhost/PawCentral/public');
    /**
     * database config
     */
    define('DBNAME','pawcentral');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','');
}else{
     define('ROOT', 'https://www.pawcentral.com');  //put the website name here if hosted 

    define('DBNAME','pawcentral');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','');
}

define('APP_NAME',"My website");
define('APP_DESC',"this is best website in world");

//true mean show errors
define('DEBUG',true);
