<?php

class Sellingpost{
    use Controller;

    public function index(){
        $id=$_GET['id'];
        $model=new AddPostpet();
        $post=$model->first(['pet_id'=>$id]);
        if (!$post) {
            header("Location: " . ROOT . "/findapet");
            exit;
        }
    
        $this->view('sellingpost',['post'=>$post]);
    }
    
}