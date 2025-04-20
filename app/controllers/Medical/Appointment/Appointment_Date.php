<?php

class Appointment_Date{
    use Controller;
    private $valid_roles = ['user'];   // Only regular users can access this page
    
    public function index() {
        // Check if user is a reg user
        if($this->isAuthorized($this->valid_roles)){
            $this->view("medi.f/appointment/appointment-1-date");
        } else {
            // Store the referrer in session before redirecting to 403 page
            // if(!empty($_SERVER['HTTP_REFERER'])) {
            //     $_SESSION['http_referer'] = $_SERVER['HTTP_REFERER'];
            // }else {
            //     $_SESSION['http_referer'] = '';
            // }
            
            // Load the 403 error page
            redirect('403');
        }
    }
}