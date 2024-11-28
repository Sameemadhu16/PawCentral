<?php

class Profile{

    use Controller;

    function index(){
        $this->view("service/profile");
    }
}