<?php

class Service{
    use Controller;
    public function index(){
        $this->view("service");
    }
}