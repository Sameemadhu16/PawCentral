<?php

class Rentingpost{
    use Controller;

    public function index(){
        $id=$_GET['id'];
        $model=new RentPost();
        $post=$model->first(['pet_id'=>$id]);
        if (!$post) {
            header("Location: " . ROOT . "/findapet");
            exit;
        }
    
        $this->view('rentingpost',['post'=>$post]);
    }
    
}