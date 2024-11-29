<?php

class Notification{

    use Controller;

    function index(){
        $this->view('merchant/notification');
    }
}