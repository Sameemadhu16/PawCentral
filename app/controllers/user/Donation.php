<?php

class Donation{

    use Controller;

    function index(){
        $this->view('user/donation');
    }
}