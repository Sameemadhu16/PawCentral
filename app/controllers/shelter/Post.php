<?php

class Post{
    use Controller;

    public function index(){
        $this->view('shelter/post');
    }
}