<?php

class UserProfile{

    use Controller;

    public function index(){
        $this->view('user/userprofile');
    }

}