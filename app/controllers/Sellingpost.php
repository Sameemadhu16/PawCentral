<?php

class Sellingpost{
    use Controller;

    public function index(){

         $detailsPost=new AddPostpet();
        $this->view('sellingpost');
    }
    
}