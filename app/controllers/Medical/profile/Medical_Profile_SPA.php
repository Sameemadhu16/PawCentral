<?php

class Medical_Profile_SPA{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/medical-profile-spa");
    }
}