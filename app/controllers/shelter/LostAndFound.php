<?php

class LostAndFound{

    use Controller;

    function index(){
        $this->view('shelter/lost_and_found');
    }
}