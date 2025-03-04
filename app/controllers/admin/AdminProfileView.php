<?php

/**
 * AdminProfileView Controller
 * Handles profile viewing and updating functionality
 */
class AdminProfileView{
    // Include Controller trait for common functionality
    use Controller;

    /**
     * Main index method
     * Handles both display and update of profile
     */
    public function index(){
        // Check if form was submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])){
            $this->updateProfile();
        }

        // Get current profile data
        $status = $this->getProfile();
        // Display the profile view form
        $this->view('admin/profile_view',['profile' => $status]);
    }

    /**
     * Private method to handle profile updates
     * Includes profile picture upload functionality
     */
    private function updateProfile(){
        $updateAdmin = new User();
       
        // Process form data
        $updatename = explode(" ", $_POST['name']);
        $data = [
            'first_name' => trim($updatename[0]),
            'last_name' => trim($updatename[1]),
            'email' => trim($_POST['email']),
            'mobile_no' => trim($_POST['mobile'])
        ];

        // Handle profile picture upload
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            // Set upload directory
            $target_dir = "profile-images/";
            
            // Create directory if doesn't exist
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Generate unique filename
            $file_name = basename($_FILES['profile_pic']['name']);
            $target_file = $target_dir . uniqid() . "_" . $file_name;

            // Validate image file type
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($file_type, $allowed_types)) {
                $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
                $this->view('profile_view', $data);
                return;
            }

            // Verify if file is actual image
            if (getimagesize($_FILES['profile_pic']['tmp_name']) === false) {
                $_SESSION['error'] = "The selected file is not a valid image.";
                $this->view('profile_view', $data);
                return;
            }

            // Upload the file
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                $data['profile_pic'] = $target_file;
            } else {
                $_SESSION['error'] = "Failed to upload the profile picture.";
                $this->view('profile_view', $data);
                return;
            }
        }

        // Update profile if user is authenticated
        if ($_SESSION['user']->id) {
            if ($updateAdmin->update($_SESSION['user']->id, $data)) {
                // Update session with new user data
                $arr['id'] = $_SESSION['user']->id;
                $updateUser = $updateAdmin->first($arr);
                $_SESSION['user'] = $updateUser;

                // Redirect to profile page
                redirect('/admin/profile');
            } else {
                die('Something went wrong');
            }
        } else {
            // If update fails, return to profile view
            $this->view('admin/profile_view', $data);
        }
    }

    /**
     * Private method to fetch profile information
     * @return object|null Returns user data if found
     */
    private function getProfile(){
        $id = $_SESSION['user']->id;
        
        if($id){
            $user = new User();
            $userUpdate = $user->first(['id'=>$id]);
            return $userUpdate;
        }
    }
}