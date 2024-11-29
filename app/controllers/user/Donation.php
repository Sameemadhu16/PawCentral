<?php

class Donation{

    use Controller;

    function index(){
        if($_SESSION['user_id']){
            $this->view('user/donation');
        }else{
            $this->view('home');
        }

    }
}