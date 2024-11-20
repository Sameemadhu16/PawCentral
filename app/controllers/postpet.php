<?php 
class Postpet{
    use controller;
    public function index(){
        $this->view("postpet");
    }
    public function submit(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $model=new PostPetModel();
            $data=[
                'tradeType'=>htmlspecialchars($_POST['tradeType']),
                'petName'=>htmlspecialchars($_POST['petName']),
                'species'=>htmlspecialchars($_POST['species']),
                'breed'=>htmlspecialchars($_POST['breed']),
                'genderNeeds'=>htmlspecialchars($_POST['genderNeeds']),
                'contactName'=>htmlspecialchars($_POST['contactName']),
                'contactNumber'=>htmlspecialchars($_POST['contactNumber']),
                'email'=>filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
            ];


            $model->insertPost($data);

            header("location:". ROOT ."postpet/postpetnext");
            exit;
        }
    }
}