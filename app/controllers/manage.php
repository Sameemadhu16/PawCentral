<?php

class Manage{
    use Controller;
    public function index(){
        $merchant_id = $_SESSION['role_id'];
        
        $sellPost = new AddPostpet();
        $rentPost = new RentPost();
        $importPost = new ImportPet();
       
        // Get only posts belonging to this merchant
        $sell_posts = $sellPost->where(['merchant_id' => $merchant_id]);
        $rent_posts = $rentPost->where(['merchant_id' => $merchant_id]);
        $import_posts = $importPost->where(['merchant_id' => $merchant_id]);
        
        $this->view("Manage",['sell_posts'=>$sell_posts,'rent_posts'=>$rent_posts,'import_posts'=>$import_posts]);
        
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? null;
        echo "<pre>";
        print_r($type);
        print_r($id);
        echo "</pre>";
        if($type==='Selling'){
        $managePost=new AddPostpet();
        }elseif($type==='Renting'){
            $managePost=new RentPost();
        }elseif($type==='Importing'){
            $managePost=new ImportPet();
        }

        $post = $managePost->first(['pet_id' => $id]);
        if (!$post) {
            header("Location: " . ROOT . "/manage");
            exit;
        }
       
        // Pass the post data and any errors to the view
        $this->view("editpost", ['post' => $post, 'error' => $error ?? null]);
    }



    
public function delete() 
{
    $id=$_GET['id'] ?? null;
    $tradeType=$_GET['tradeType'] ?? null;
    echo "<pre>";
    print_r($id);
    print_r($tradeType);
    echo "</pre>";
    if($tradeType==='Selling'){
        $deletePost=new AddPostpet();
    }elseif($tradeType=='Renting'){
        $deletePost=new RentPost();
    }elseif($tradeType==='Importing'){
        $deletePost=new ImportPet();
    }
    $post=$deletePost->first(['pet_id'=>$id]);
    $data=[
        'delete_status'=>1
    ];
    if ($deletePost->update($id, $data,'pet_id')) {
            
        header("Location: " . ROOT . "/service/manage");
        exit;
    } else {
        echo "Error: Unable to update the post.";
    }


}
public function details($id) {
    $id=$_GET['id'] ?? null;
    $tradeType=$_GET['tradeType'] ?? null;
    if($tradeType==='Selling'){
        $detailsPost=new AddPostpet();
    }elseif($tradeType=='Renting'){
        $detailsPost=new RentPost();
    }elseif($tradeType==='Importing'){
        $detailsPost=new ImportPet();
    }
    $post=$detailsPost->first(['pet_id'=>$id]);
    
    if (!$post) {
        header("Location: " . ROOT . "/manage");
        exit;
    }

    // Display the details page
    $this->view('postdetails', ['post' => $post]);
}
public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'] ?? null;
        $tradeType = $_POST['tradeType'] ?? null;
        echo "<pre>";
        print_r($tradeType);
        print_r($id);
        echo "</pre>";
        if (!$id || !$tradeType) {
            echo "Error: Missing required data.";
            return;
        }

        // Initialize the appropriate model based on tradeType
        switch($tradeType) {
            case 'Selling':
                $model = new AddPostpet();
                break;
            case 'Renting':
                $model = new RentPost();
                break;
            case 'Importing':
                $model = new ImportPet();
                break;
            default:
                echo "Error: Invalid trade type.";
                return;
        }

        // Common fields for all post types
        $data = [
            'pet_name' => htmlspecialchars($_POST['petName']),
            'species' => htmlspecialchars($_POST['species']),
            'breed' => htmlspecialchars($_POST['breed']),
            'sex' => htmlspecialchars($_POST['sex']),
            'age' => (float)htmlspecialchars($_POST['age']),
            'height' => (float)htmlspecialchars($_POST['height']),
            'weight' => (float)htmlspecialchars($_POST['weight']),
            'neutered' => $_POST['neutered'] === 'Yes' ? 1 : 0,
            'trained' => $_POST['trained'] === 'Yes' ? 1 : 0,
            'pedigree' => $_POST['pedigree'] === 'Yes' ? 1 : 0,
            'vaccinated' => $_POST['vaccinated'] === 'Yes' ? 1 : 0,
            'contactName' => htmlspecialchars($_POST['contactName']),
            'contactNumber' => htmlspecialchars($_POST['contactNumber']),
            'email' => htmlspecialchars($_POST['email']),
        ];

        // Type-specific fields
        switch($tradeType) {
            case 'Selling':
                $data['price'] = htmlspecialchars($_POST['price']);
                $data['fee_negotiable'] = isset($_POST['feebox']) ? 1 : 0;
                $data['City'] = htmlspecialchars($_POST['city']);
                $data['Exact_address'] = htmlspecialchars($_POST['address']);
                break;
                
            case 'Renting':
                $data['rental_fee'] = htmlspecialchars($_POST['price']);
                $data['rental_duration'] = htmlspecialchars($_POST['rental_duration']);
                $data['renter_name'] = htmlspecialchars($_POST['renter_contact']); // Assuming this is the field name
                $data['renter_address'] = htmlspecialchars($_POST['address']);
                break;
                
            case 'Importing':
                $data['import_fees'] = htmlspecialchars($_POST['price']);
                $data['importing_owner'] = htmlspecialchars($_POST['importing_owner']);
                $data['importer_mobile'] = htmlspecialchars($_POST['importer_mobile']);
                $data['country'] = htmlspecialchars($_POST['country']);
                $data['transport_method'] = htmlspecialchars($_POST['transport']);
                break;
        }

        if ($model->update($id, $data,'pet_id')) {
            
            header("Location: " . ROOT . "/service/manage");
            exit;
        } else {
            echo "Error: Unable to update the post.";
        }
    } else {
        echo "Invalid request method.";
    }
}
}