<?php

class Notification{

    use Controller;

    function index(){
        $this->view('user/notification');
    }
}