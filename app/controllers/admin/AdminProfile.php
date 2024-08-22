<?php

class AdminProfile{

    use Controller;

    public function index(){
        $this->view('admin/profile');
    }

}