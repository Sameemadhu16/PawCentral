<?php

class AdminUserAccount{

    use Controller;

    private $valid_roles = ['admin'];
    public function index(){

        $this->isAuthorized($this->valid_roles);
        $this->getUsers();
        $data = [
            'regular' => $this->getUserCountByService('user'),
            'seller' => $this->getUserCountByService('seller'),
            'adoptionShelters' => $this->getUserCountByService('adoption-shelter'),
            'careServiceProviders' => $this->getUserCountByService('care-service-provider'),
            'medicalProviders' => $this->getUserCountByService('medical-provider'),
            'users' => $this->getUsers()
        ];

        $this->view('admin/user_account', $data);
    }

    private function getUsers(){
        $userModel = new User;
        $userDetails = $userModel->get([],
        [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);
        show($userDetails);
        // return $userDetails;
    }

    private function getUserCountByService($service){
        $userModel = new User;
        $userDetails = $userModel->get(['service_type' => $service],
        [
            'order_column' => 'updated_at',
            'order_type' => 'desc'
        ]);
        // return($userDetails);
        
        if (is_array($userDetails)) {
            $count = count($userDetails);
            return($count);
        } else {
            show("Error: Expected an array of user details.");
        }
        // return $userDetails;
    }
}