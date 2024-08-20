<?php

class SignIn{
    use Controller;

    public function index(){
        $this->view("signin");
    }
}