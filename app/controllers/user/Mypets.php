<?php

class Mypets{

    use Controller;

    public function index(){
        $this->view('user/mypets');
    }

}