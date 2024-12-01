<?php

class AdminUserAccount{

    use Controller;

    public function index(){

        $this->view('admin/user_account');
    }
}