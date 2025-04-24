<?php

class Appointment_Confirmation{
    use Controller;
    private $valid_roles = ['user'];   // Only regular users can access this page
    
    public function index() {
        
        if($this->isAuthorized($this->valid_roles)){
            $this->view("medi.f/appointment/appointment-confirmation");
        } else {
            //access denied page
            redirect('403');
        }
    }
}