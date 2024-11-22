<?php

class Donation{

    use Controller;

    function index(){
        $this->view('shelter/donation');
    }
}