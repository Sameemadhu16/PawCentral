<?php

class AdminDonation{

    use Controller;

    public function index(){
        $this->view('admin/donation');
    }
}