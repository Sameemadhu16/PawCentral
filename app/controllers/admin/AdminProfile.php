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
            // $_SESSION['user']['profile_pic'] = $userUpdate->profile_pic;
            //  show($_SESSION['user']['profile_pic']);
            return $userUpdate;
        }
    }
}