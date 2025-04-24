<?php

class Error_Authentication{
    use Controller;

    public function index() {
        if(!empty($_SERVER['HTTP_REFERER'])) {
            $_SESSION['http_referer'] = $_SERVER['HTTP_REFERER'];
        }else {
            $_SESSION['http_referer'] = '';
        }
        $this->view("403_forbidden");
    }
}