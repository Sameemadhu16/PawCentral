<?php

class Profile{

    use Controller;

    function index() {
        $userid = $_SESSION['user_id'];
        if (!isset($_SESSION['user_id'])) {
            redirect('home');
        }
    
        // Fetch provider details (assuming first() returns PDO object)
        $providerModel = new ServiceProvModel();
        $providerDetails = $providerModel->first(['user_id' => $userid]);
    
        // Convert the PDO result to a stdClass object (assuming the result is associative)
        $providerDetails = json_decode(json_encode($providerDetails));
    
        // Fetch user profile data
        $model = new UserProfilesModel();
        $user['profile'] = $model->getUserInf();
    
        // Merge provider details into the user data array
        $data = array_merge($user, ['providerDetails' => $providerDetails]);
    
        // Print the merged data to check structure
       
        // exit();
    
        // Pass the merged data to the view
        $this->view('provider/profile', $data);
    }
    

    function update(){
        if(!($_SESSION['user_id'])){
            echo json_encode([
                'status' => 'error',
                'message' => 'User not logged in'
            ]);
            return;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $model = new UserProfilesModel();
            $serviceModel=new ServiceProvModel();
            try {
                // Handle file upload if present
                if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0){
                    $target_dir = "uploads/profile_pics/";
                    if(!is_dir($target_dir)){
                        mkdir($target_dir, 0777, true);
                    }
                    
                    $file_name = basename($_FILES['profile_pic']['name']);
                    $target_file = $target_dir . uniqid() . "_" . $file_name;
                    
                    if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)){
                        $_POST['img'] = $target_file;
                    } else {
                        throw new Exception("Failed to upload profile picture");
                    }
                }

                // Update user data
                $data = [
                    'first_name' => $_POST['first_name'] ?? '',
                    'last_name' => $_POST['last_name'] ?? '',
                    'mobile_no' => $_POST['mobile_no'] ?? '',
                    'location' => $_POST['location'] ?? '',
                    'address' => $_POST['address'] ?? ''
                ];
                $dataService = [
                    'name' => $_POST['shop_name'] ?? '',
                    'service_type' => $_POST['service_type'] ?? '',
                    'Areas' => $_POST['Area'] ?? '',
                    'open_hour' => $_POST['opening_hour'] ?? '',
                    'closing_hour' => $_POST['closing_hour'] ?? '',
                    'description'=>$_POST['description'] ?? '',
                ];

                if(isset($_POST['img'])){
                    $data['profile_pic'] = $_POST['img'];
                }
                
                if($model->update($_SESSION['user_id'], $data) && $serviceModel->updateByUserId($_SESSION['user_id'],$dataService)){
                    if(isset($_POST['img'])){
                        $_SESSION['user']->profile_pic = $_POST['img'];
                    } 
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Profile updated successfully'
                    ]);
                } else {
                    throw new Exception("Failed to update profile in database");
                }
            } catch (Exception $e) {
                error_log("Profile update error: " . $e->getMessage());
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }
    }
}