<?php

class Donation{

    use Controller;

    function index(){
        if($_SESSION['user_id']&&$_SESSION['user']->role=='assd'){
            $this->view('user/donation');
        }else{
            $this->view('home');
        }

    }
}