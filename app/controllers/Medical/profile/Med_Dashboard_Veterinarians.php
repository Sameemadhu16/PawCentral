<?php

class Med_Dashboard_Veterinarians{
    use Controller;

    public function index() {
        $veterinarianModel = new Veterinarians();
        $veterinarians = $veterinarianModel->get([], [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);
        $this->view("medi.f/profile/med-veterinarians",['veterinarians' => $veterinarians]);
    }   
}