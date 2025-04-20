<?php 
class Shop{
    use Controller;
    
    function index(){

        $shop_id=$_SESSION['user_id'];
        $model=new Products();
        $ProductPosts=$model->where(['shop_id'=>$shop_id]);



        $this->view('provider/shop',['ProductPosts'=>$ProductPosts]);


    }
   
}
