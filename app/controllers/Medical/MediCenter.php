<?php

class MediCenter{
    use Controller;

    public function index() {
        $this->view("medi.f/mediCenter");
    }
}