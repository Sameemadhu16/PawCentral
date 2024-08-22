<?php

class AdminMedicalRegistration{
    
    use Controller;

    public function index(){
        $this->view('admin/medical_registration');
    }
}