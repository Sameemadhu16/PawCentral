<?php

class Profile{

    use Controller;

    function index(){
        $this->view('user/profile');
    }
}