<?php


class Events{

    use Controller;

    function index(){
        $this->view('shelter/event');
    }
}