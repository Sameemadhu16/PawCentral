<?php 
class Postpet{
    use controller;
    public function index(){
        $this->view("postpet");
    }
    public function submit(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $model=new Postpet();
            $data1=[
                'tradeType'=>htmlspecialchars($_POST['tradeType']),
                'petName'=>htmlspecialchars($_POST['petName']),
                'species'=>htmlspecialchars($_POST['species']),
                'breed'=>htmlspecialchars($_POST['breed']),
                'genderNeeds'=>htmlspecialchars($_POST['genderNeeds']),
                'contactName'=>htmlspecialchars($_POST['contactName']),
                'contactNumber'=>htmlspecialchars($_POST['contactNumber']),
                'email'=>filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
            ];
            $_SESSION['postpet_data'] = $data1;

            // Redirect to the next page (confirmation page)
            header("Location: ". ROOT . "/service/postpet/postpetnext");
            exit(); // Prevent further execution

          
        }
    }
}