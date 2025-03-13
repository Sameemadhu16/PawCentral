<?php

class MediCenter{
    use Controller;

    public function index() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id) {
            redirect('medical-centers');
            return;
        }
        
        $medicalCenterModel = new MedicalProvModel;
        $userModel = new User;
        $veterinarianModel = new Veterinarians;

        $medical_center = $medicalCenterModel->first(['med_id' => $id]);

        //get the user email
        $user = $userModel->first(['id' => $medical_center->user_id]);
        $medical_center->email = $user->email;

        //get the veterinarians
        $veterinarians = $veterinarianModel->get([], [
            'order_column' => 'name',
            'order_type' => 'desc'
        ]);

        if (!$medical_center) {
            echo "Medical center not found";
            return;
        }  
        $this->view("medi.f/mediCenter", ['medical_center' => $medical_center, 'veterinarians' => $veterinarians]);
    }
}