<?php
class PostForm {
    use Controller;
    
    public function index() {
        $this->view('provider/postForm');
    }
    
    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Initialize error array
            $errors = [];
            
            // Validate and sanitize inputs
            $product_name = trim(htmlspecialchars($_POST['product_name'] ?? ''));
            $description = trim(htmlspecialchars($_POST['description'] ?? ''));
            $price = trim(htmlspecialchars($_POST['price'] ?? ''));
            $stock_quantity = trim(htmlspecialchars($_POST['stock_quantity'] ?? ''));
            
            
           
            // Validate image
            $imageName = '';
            $publicPath = '';
            if (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
                $errors['img'] = 'Product image is required';
            } else {
                $imageTmpPath = $_FILES['img']['tmp_name'];
                $originalName = basename($_FILES['img']['name']);
                $imageName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\.\-]/', '_', $originalName);
                
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/PawCentral/public/assets/uploads/';
                $targetFilePath = $uploadDir . $imageName;
                $publicPath = 'assets/uploads/' . $imageName;
                
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $fileType = mime_content_type($imageTmpPath);
                
                if (!in_array($fileType, $allowedTypes)) {
                    $errors['img'] = 'Only JPG, PNG, and GIF files are allowed';
                } elseif ($_FILES['img']['size'] > 5 * 1024 * 1024) { // 5MB limit
                    $errors['img'] = 'Image size must be less than 5MB';
                }
            }
            
            // Check if user is logged in
            if (!isset($_SESSION['user_id'])) {
                $errors['auth'] = 'You must be logged in to post a product';
            }
            
            // If there are errors, return to form with errors
            if (!empty($errors)) {
                $_SESSION['form_errors'] = $errors;
                $_SESSION['old_input'] = [
                    'product_name' => $product_name,
                    'description' => $description,
                    'price' => $price,
                    'stock_quantity' => $stock_quantity
                ];
                header("Location: " . ROOT . "/postForm");
                exit();
            }
            
            // Try to upload image if no errors
            if (empty($errors)) {
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                if (!move_uploaded_file($imageTmpPath, $targetFilePath)) {
                    $_SESSION['form_errors'] = ['img' => 'Failed to upload image'];
                    header("Location: " . ROOT . "/postForm");
                    exit();
                }
            }
            
            // Prepare data for database
            $data = [
                'shop_id' => $_SESSION['user_id'],
                'product_name' => $product_name,
                'description' => $description,
                'price' => $price,
                'stock_quantity' => $stock_quantity,
                'created_at' => date('Y-m-d H:i:s'),
                'img' => $publicPath, // Store the public path
                'delete_status'=>0,
            ];
            
            // Insert into database
            $productModel = new Products();
            if ($productModel->insert($data)) {
                $_SESSION['success_message'] = 'Product posted successfully!';
                header("Location: " . ROOT . "/shop");
                exit();
            } else {
                $_SESSION['form_errors'] = ['database' => 'Error saving product. Please try again.'];
                header("Location: " . ROOT . "/shop");
                exit();
            }
        }
        
        // If not POST request, redirect
        header("Location: " . ROOT . "/shop");
        exit();
    }
    public function edit(){
        $id=$_GET['id'];
        $editModel=new Products();
        $post=$editModel->first(['product_id'=>$id]);
        
        if (!$post) {
            header("Location: " . ROOT . "shop");
            exit;
        }
       
        // Pass the post data and any errors to the view
        $this->view("provider/editPostForm", ['post' => $post, 'error' => $error ?? null]);
       
    }
    public function update(){
        echo "<pre>";
        print_r("hello");
        echo "</pre>";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_POST['id'];
            if (!$id) {
                echo "Error: Missing required data.";
                return;
            }
            echo "<pre>";
            print_r($id);
            echo "</pre>";
        }
            $product_name = trim(htmlspecialchars($_POST['product_name'] ?? ''));
            $description = trim(htmlspecialchars($_POST['description'] ?? ''));
            $price = trim(htmlspecialchars($_POST['price'] ?? ''));
            $stock_quantity = trim(htmlspecialchars($_POST['stock_quantity'] ?? ''));

            if (empty($product_name)) {
                $errors['product_name'] = 'Product name is required';
            } elseif (strlen($product_name) > 100) {
                $errors['product_name'] = 'Product name must be less than 100 characters';
            }
            
            // Validate description
            if (empty($description)) {
                $errors['description'] = 'Description is required';
            } elseif (strlen($description) > 500) {
                $errors['description'] = 'Description must be less than 500 characters';
            }
            
            // Validate price
            if (empty($price)) {
                $errors['price'] = 'Price is required';
            } elseif (!is_numeric($price) || $price <= 0) {
                $errors['price'] = 'Price must be a positive number';
            }
            
            // Validate stock quantity
            if (empty($stock_quantity)) {
                $errors['stock_quantity'] = 'Stock quantity is required';
            } elseif (!filter_var($stock_quantity, FILTER_VALIDATE_INT) || $stock_quantity < 0) {
                $errors['stock_quantity'] = 'Stock quantity must be a positive integer';
            }
            $model=new Products();
            $data = [
                'shop_id' => $_SESSION['user_id'],
                'product_name' => $product_name,
                'description' => $description,
                'price' => $price,
                'stock_quantity' => $stock_quantity,
                'created_at' => date('Y-m-d H:i:s'),
                
            ];
            if ($model->update($id, $data,'product_id')) {
            
                header("Location: " . ROOT . "/shop");
                exit;
            } else {
                echo "Error: Unable to update the post.";
            }
            
    }
    public function delete(){
        $id=$_GET['id'] ?? null ;
        $model=new Products();
        $deletePost=$model->first(['product_id'=>$id]);
        $data=[
            'delete_status'=>1,
        ];
        if($model->update($id,$data,'product_id')){
            header("Location:". ROOT . "/shop");

        }else{
            echo "Unable to Delete the Post";
        }
    }
}