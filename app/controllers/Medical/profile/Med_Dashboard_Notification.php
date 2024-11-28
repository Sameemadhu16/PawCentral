<?php

class Med_Dashboard_Notification{
    use Controller;

    public function index() {
        $this->view("medi.f/profile/med-notification");
    }
}