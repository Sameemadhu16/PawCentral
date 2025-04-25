<?php

class Profile{

    use Controller;
    private $valid_roles = ['shelter'];

    public function index()
    {
        $this->isAuthorized($this->valid_roles);
        if(!($_SESSION['user_id'])){
            
            redirect('home');
        }

        $userModel = new UserProfilesModel();
        $shelterModel = new ShelterModel();

        $user['profile'] = $userModel->getUserInf();
        $user['shelter'] = $shelterModel->getShelterById($_SESSION['user_id']);

        // show($user['shelter']);

        $this->view('shelter/profile',$user);
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
            $shelterModel = new ShelterModel();
            
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
                    // 'mobile_no' => $_POST['mobile_no'] ?? '',
                    'location' => $_POST['location'] ?? '',
                    'address' => $_POST['address'] ?? ''
                ];

                $data1 = [
                    'name' => $_POST['shelter_name'] ?? '',
                    'contact_no' => $_POST['contact_no'] ?? '',
                    'capacity' => $_POST['capacity'] ?? '',
                    'description' => $_POST['description' ?? '']
                ];


                if(isset($_POST['img'])){
                    $data['profile_pic'] = $_POST['img'];
                }

                if(($model->update($_SESSION['user_id'], $data)) && $shelterModel->update($_POST['shelter_id'],$data1,'id') ){
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