<?php

class AdminProfile{

    use Controller;

    public function index(){
        // $id = $_SESSION['user']->id;
        // show($id);
        $status = $this->getProfile();
        // show($status);
        $this->view('admin/profile', ['profile' => $status]);
    }

    private function getProfile(){

        $id = $_SESSION['user']->id;
        
        if($id){
            $user = new User();
            $userUpdate = $user->first(['id'=>$id]);
            // show($userUpdate);
            return $userUpdate;
        }
    }
}