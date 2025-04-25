<?php

class Importingpost{
    use Controller;

    public function index(){
        $id=$_GET['id'];
        $model=new ImportPet();
        $post=$model->first(['pet_id'=>$id]);
        if (!$post) {
            header("Location: " . ROOT . "/findapet");
            exit;
        }
    
        $this->view('importingpost',['post'=>$post]);
    }
    
}