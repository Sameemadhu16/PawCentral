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
        $med_prov_med_serv = new Med_Prov_Med_Serv;
        $med_servicesModel = new Med_Services;

        $medical_center = $medicalCenterModel->first(['med_id' => $id]);

        //get the user email
        $user = $userModel->first(['id' => $medical_center->user_id]);
        $medical_center->email = $user->email;

        // get the services
        //get ids
        $service_ids = $med_prov_med_serv->where(['med_id' => $id]);
        // Get service names
        $services = [];
        if ($service_ids) {
            foreach ($service_ids as $service) {
                $service_details = $med_servicesModel->first(['service_id' => $service->service_id]);
                // Combine the service ID with the service name
                $service->service_name = $service_details->service_name;
                $services[] = $service;
            }
        }

        //get the veterinarians
        $veterinarians = $veterinarianModel->where(['med_id' => $id]);

        if (!$medical_center) {
            echo "Medical center not found";
            return;
        }  
        $this->view("medi.f/mediCenter", ['medical_center' => $medical_center, 'veterinarians' => $veterinarians, 'services' => $services]);
    }
}