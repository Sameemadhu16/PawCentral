<?php 
class Shop{
    use Controller;
    
    function index(){

        $shop_id=$_SESSION['user_id'];
        $model=new Products();
        $ProductPosts=$model->where(['shop_id'=>$shop_id]);
        $shops=new Shops();
        $shopsDetails=$shops->first(['user_id'=>$shop_id]);


        $this->view('provider/shop',['ProductPosts'=>$ProductPosts,'shopsDetails'=>$shopsDetails]);


    }
    public function ShowInquiries(){
        
        $model=new Inquire();
        $id=$_SESSION['user_id'];
        $list=$model->where(['shop_id'=>$id]);
        $this->view('provider/inquiries',['inquiries'=>$list]);
    }
    public function Reply($inquiry){
        $model1=new Inquire();
        $model2=new Notificationinq();
        $inquiry_id=$_GET['id'];
        
        
       
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $reply=htmlspecialchars($_POST['reply']);
        }
        $data1=[
            'message'=>$reply,
            'title'=>$inquiry['title'],
            'user_id'=>$inquiry['id'],
        ];
        $data2=[
            'reply'=> '1'
        ];
        $notificationResult = $model2->insert($data1);
        if ($notificationResult) {
            // Update inquiry reply st $data2 = ['reply' => 1];
            $updateResult = $model1->update($inquiry['inquire_id'], $data2, 'inquire_id');
            
            if ($updateResult) {
                redirect('provider/inquiries');
            } else {
                echo "Failed to update inquiry reply status.";
            }
        } else {
            echo "Failed to send notification.";
        }
        
    }
    public function Ignore($inquiry){
        show($inquiry);
        $model1=new Inquire();
        $data2=[
            'reply'=> '1'
        ];
      
            $updateResult = $model1->update($inquiry['inquire_id'], $data2, 'inquire_id');
            if ($updateResult) {
                redirect('provider/inquiries');
            } else {
                echo "Failed to update inquiry reply status.";
            }
      
        
    }
   
}
