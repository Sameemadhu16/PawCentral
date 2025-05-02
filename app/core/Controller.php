<?php

trait Controller {
    public function view($name, $data = []){
        if(!empty($data)){
            extract($data);
        }

        $fileName = "../app/views/".$name.".view.php";
        if(file_exists($fileName)){
            require $fileName;
        }else{
            $fileName = "../app/views/home.view.php";
            require $fileName;
        }
    }

    // CHECK AUTHORIZATION FUNCTION

    // CALL THE isAUthorized Function with the allowed roles that can access the route called page/controller function.
    // Pass an array of the user roles allowed 
    public function isAuthorized(array $valid_roles) {
        
        if (isset($_SESSION['user'])) {     // Check if the user is logged in and has a valid role
            if (in_array($_SESSION['user']->role, $valid_roles)) {      // Check if the user's role exists in the valid roles array
                return true;
            }else{
                // shenal added this
                return false;
            }
        }
        // return false;
        header('Location: access_denied.php'); //route to 404.view.php
    }

}