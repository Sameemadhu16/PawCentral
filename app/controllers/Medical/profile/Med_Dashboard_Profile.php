<?php

class Med_Dashboard_Profile {
    use Controller;

    public function index(){
        // Check if form was submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['medical'])){
            $this->updateProfile();
        }
   
        // Get current profile data
        $status = $this->getProfile();
        // Display the profile view form
        $this->view('medi.f/profile/med-profile',['profile' => $status]);
    }

    private function updateProfile(){
        $user = new User();
       
        // Process form data
        $data = [
            'first_name' => trim($_POST['first_name']),
            'last_name' => trim($_POST['last_name']),
            'email' => trim($_POST['email']),
            'mobile_no' => trim($_POST['mobile_no'] ?? ''),
            'location' => trim($_POST['location'] ?? ''),
            'about' => trim($_POST['about'] ?? '')
        ];

        // Handle profile picture upload
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            // Set upload directory - use absolute path for reliability
            $target_dir = "uploads/profile-images/";
            
            // Create directory if doesn't exist
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Generate unique filename
            $file_name = basename($_FILES['profile_pic']['name']);
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $target_file = $target_dir . uniqid() . "." . $file_ext;

            // Validate image file type
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($file_ext, $allowed_types)) {
                $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
                return false;
            }

            // Verify if file is actual image
            if (getimagesize($_FILES['profile_pic']['tmp_name']) === false) {
                $_SESSION['error'] = "The selected file is not a valid image.";
                return false;
            }

            // Upload the file
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                $data['profile_pic'] = $target_file;
            } else {
                $_SESSION['error'] = "Failed to upload the profile picture: " . error_get_last()['message'];
                return false;
            }
        }

        // Update profile if user is authenticated
        if (isset($_SESSION['user']) && $_SESSION['user']->id) {
            if ($user->update($_SESSION['user']->id, $data)) {
                // Update session with new user data
                $updatedUser = $user->first(['id' => $_SESSION['user']->id]);
                $_SESSION['user'] = $updatedUser;

                // Set success message
                $_SESSION['success'] = "Profile updated successfully!";
                
                // Update medical provider table if needed
                if (isset($_SESSION['role_id'])) {
                    $medprov = new MedicalProvModel();
                    $medData = [
                        'location' => $data['location'],
                        'about' => $data['about']
                    ];
                    $medprov->update($_SESSION['role_id'], $medData, 'med_id');
                }
                
                return true;
            } else {
                $_SESSION['error'] = "Failed to update profile.";
                return false;
            }
        } else {
            $_SESSION['error'] = "User not authenticated.";
            return false;
        }
    }

    /**
     * Private method to fetch profile information
     * @return object|null Returns user data if found
     */
    private function getProfile(){
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']->id)) {
            return null;
        }
        
        $id = $_SESSION['user']->id;
        
        if($id){
            $user = new User();
            $userInfo = $user->first(['id'=>$id]);
            
            // Get additional details from medical provider table if available
            if (isset($_SESSION['role_id'])) {
                $medprov = new MedicalProvModel();
                $medInfo = $medprov->first(['med_id' => $_SESSION['role_id']]);
                
                if ($medInfo) {
                    // Merge medical provider specific details
                    if (!empty($medInfo->location) && empty($userInfo->location)) {
                        $userInfo->location = $medInfo->location;
                    }
                    
                    if (!empty($medInfo->about)) {
                        $userInfo->about = $medInfo->about;
                    }
                }
            }
            
            return $userInfo;
        }
        
        return null;
    }
}