<?php

class AdminDonationCard{

    use Controller;

    public function index(){
        $this->view('admin/donation_card');
    }
}