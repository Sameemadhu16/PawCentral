<?php

class Services {

    use Controller;

    public function index() {
        $list=new Shops();
        $shopList=$list->findAll();

        $this->view('services',['shopList'=>$shopList]);
    }

    public function ViewShop($passed_id){
        $shop_id=$passed_id['id'];
        $model=new Products();
        $ProductPosts=$model->where(['shop_id'=>$shop_id]);
        $shops=new Shops();
        $shopsDetails=$shops->first(['user_id'=>$shop_id]);



        $this->view('viewShop',['ProductPosts'=>$ProductPosts,'shop_id'=>$shop_id,'shopsDetails'=>$shopsDetails]);


    }
    public function Inquiry($passed_id){
        $this->view('Inquire',['shop_id'=>$passed_id]);
    }
    public function submit($passed_id){
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $shop_id=$passed_id['id'];
            $inquirer_id=$_SESSION['user_id'];
            $inquiry=htmlspecialchars($_POST['message']);
            $data=[
                'shop_id'=>$shop_id,
                'inquirer_id'=>$inquirer_id,
                'inquiry'=>$inquiry,
                'created_at'=>date('Y-m-d H:i:s'),
                'reply'=>0
            ];
            $model=new Inquire();
            if ($model->insert($data)) {
                $_SESSION['success_message'] = "Inquiry successfully send";
                header("Location: " . ROOT . "/services");
                exit();
            } else {
                echo "Error saving data. Please try again.";
                exit();
            }
        }
    }
}