<?php

class Notification{

    use Controller;

    function index(){
        $this->view('shelter/notification');
    }
}