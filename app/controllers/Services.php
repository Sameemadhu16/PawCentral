<?php

class Services {

    use Controller;

    function indexWithpagination(){
        $model = new Shops();
        
        // Get filters from query parameters
        $location = $_GET['location'] ?? 'all';
        $service_type = $_GET['service_type'] ?? 'all';
        $page_no = $_GET['page'] ?? 1;
        $page_size = 1; // Items per page
        
        // Calculate offset
        $offset = ($page_no - 1) * $page_size;

        // Get total count of shops based on filters
        $total_shops = $model->getTotalShopsCount($location, $service_type);
        $total_shops = $total_shops[0]->total_shops;
        $total_pages = ceil($total_shops / $page_size);
        // print_r($total_shops);
        // Get paginated shops with filters
        $data['shopList'] = $model->getShopsWithPagination($offset, $page_size, $location, $service_type);
        
        // print_r($data['shops']);
        // exit();
        // Get distinct locations and service types for the dropdowns
        $data['locations'] = $model->getDistinctLocations();
        $data['service_types'] = $model->getDistinctServiceTypes();
        
        // Add pagination data to the view
        $data['pagination'] = [
            'current_page' => $page_no,
            'total_pages' => $total_pages,
            'total_shops' => $total_shops,
            'location' => $location,
            'service_type' => $service_type
        ];

        $this->view('services', $data);
    }

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
        $user=new User();
        $usDetails=$user->first(['id'=>$shop_id]);
        // print_r($usDetails);
        // exit();

        $this->view('viewShop',['ProductPosts'=>$ProductPosts,'shop_id'=>$shop_id,'shopsDetails'=>$shopsDetails,'usDetails'=>$usDetails]);

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