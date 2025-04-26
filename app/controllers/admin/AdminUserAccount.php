<?php

class AdminUserAccount{

    use Controller;

    private $valid_roles = ['admin'];
    public function index(){



        $this->isAuthorized($this->valid_roles);
        // $this->getUsers();
        // if($_SERVER['REQUEST_METHOD'] === 'POST'){


        //     show($_POST['status1']);
        // }
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status1'])){
            $this->UpdateUserStatus($_POST['id'], $_POST['status1']);
            // show($_POST);
        }

        $data = [
            'regular' => $this->getUserCountByService('user'),
            'seller' => $this->getUserCountByService('seller'),
            'adoptionShelters' => $this->getUserCountByService('shelter'),
            'careServiceProviders' => $this->getUserCountByService('service_prov'),
            'medicalProviders' => $this->getUserCountByService('medical_provider'),
            'users' => $this->getUsers(),
           // 'status' => $this->UpdateUserStatus(1, 'block')

            
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
        // show($userDetails);
        return $userDetails;
    }

    private function getUserCountByService($service){
        $userModel = new User;
        $userDetails = $userModel->get(['role' => $service],
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

    private function UpdateUserStatus($id, $status){
        $userModel = new User;
        $user = $userModel->update($id, ['status' => $status]);
        // show($user);
        return $user;
    }

}