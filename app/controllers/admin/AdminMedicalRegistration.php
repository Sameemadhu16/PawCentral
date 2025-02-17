<?php

class AdminMedicalRegistration{

    use Controller;
    use Model;
    

    public function index(){

        $medicalProvider = new MedicalProvModel();

        $data = $this->fetchMedicalProviderData($medicalProvider);

        $this->view('admin/medical_registration',$data);
    }

    private function fetchMedicalProviderData($medicalProviderData) {
        
        $data = $medicalProviderData->findAll();
        return $data;
    }
}