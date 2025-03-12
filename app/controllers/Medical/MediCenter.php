<?php

class MediCenter{
    use Controller;

    public function index($parms = null) {
        $id = $parms['id'] ?? null;
        $medicalCenterModel = new MedicalProvModel;
        $medical_center = $medicalCenterModel->first(['med_id' => $id]);
        if (!$medical_center) {
            // Handle case where medical center is not found
            echo "Medical center not found";
            return;
        }
        
        $this->view("medi.f/mediCenter", ['medical_center' => $medical_center]);
    }
}