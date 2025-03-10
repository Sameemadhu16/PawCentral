<?php

class Med_Dashboard_Profile {
    use Controller;

    public function index() {
        // Handle POST requests for profile updates
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $this->updateProfile();
            return;
        }
   
        // For GET requests, display the profile
        $profile = $this->getProfile();
        $this->view('medi.f/profile/med-profile', ['profile' => $profile]);
    }

    // New method to handle dedicated update-profile route
    public function updateProfile() {
        try {
            $user = new User();
            
            if (!isset($_SESSION['user']) || !$_SESSION['user']->id) {
                throw new Exception("User not authenticated.");
            }
            
            // Process form data
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'mobile_no' => trim($_POST['mobile_no'] ?? ''),
                'location' => trim($_POST['location'] ?? ''),
                'about' => trim($_POST['about'] ?? '')
            ];
            
            
            // Validate required fields
            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email'])) {
                throw new Exception("Missing required fields.");
            }

            // Handle profile picture upload
            if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
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
                    throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed.");
                }

                // Verify if file is actual image
                $check = getimagesize($_FILES['profile_pic']['tmp_name']);
                if ($check === false) {
                    throw new Exception("File is not an image.");
                }

                // Upload the file
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                    $data['profile_pic'] = $target_file;
                } else {
                    $error = error_get_last();
                    throw new Exception("Failed to upload file: " . ($error ? $error['message'] : 'Unknown error'));
                }
            }

            // Update user profile
            if (!$user->update($_SESSION['user']->id, $data)) {
                throw new Exception("Database update failed.");
            }
            
            // Update session with new user data
            $updatedUser = $user->first(['id' => $_SESSION['user']->id]);
            $_SESSION['user'] = $updatedUser;
            
            // Update medical provider specific data
            if (isset($_SESSION['role_id'])) {
                $medprov = new MedicalProvModel();
                $medData = [
                    'location' => $data['location'],
                    'about' => $data['about']
                ];
                $medprov->update($_SESSION['role_id'], $medData, 'med_id');
            }

            // Return success response
            $_SESSION['success'] = "Profile updated successfully!";
            
            // Return JSON for AJAX requests
            if ($this->isAjaxRequest()) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Profile updated successfully'
                ]);
            } else {
                // For form submissions, redirect back to profile
                redirect('medical-center/dashboard#profile');
            }

        } catch (Exception $e) {
            // Log the error
            error_log("Profile update error: " . $e->getMessage());
            
            // Set session error for page loads
            $_SESSION['error'] = $e->getMessage();
            
            // Return JSON error for AJAX requests
            if ($this->isAjaxRequest()) {
                http_response_code(400);
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            } else {
                // For form submissions, redirect back to profile
                redirect('medical-center/dashboard#profile');
            }
        }
    }

    // Method to upload profile images directly
    public function uploadImage() {
        header('Content-Type: application/json');
        
        try {
            if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] !== 0) {
                throw new Exception("No image file uploaded or upload error.");
            }
            
            $target_dir = "uploads/profile-images/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $file_name = basename($_FILES['profile_pic']['name']);
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $target_file = $target_dir . uniqid() . "." . $file_ext;
            
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($file_ext, $allowed_types)) {
                throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed.");
            }
            
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                echo json_encode([
                    'status' => 'success',
                    'file_path' => $target_file
                ]);
            } else {
                throw new Exception("Failed to upload image.");
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Private method to fetch profile information
     * @return object|null Returns user data if found
     */
    private function getProfile() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']->id)) {
            return null;
        }
        
        $id = $_SESSION['user']->id;
        
        if ($id) {
            $user = new User();
            $userInfo = $user->first(['id' => $id]);
            
            // Get additional details from medical provider table if available
            if (isset($_SESSION['role_id'])) {
                $medprov = new MedicalProvModel();
                $medInfo = $medprov->first(['med_id' => $_SESSION['role_id']]);
                
                if ($medInfo) {
                    // Merge medical provider specific details
                    $userInfo->location = $medInfo->location;                  
                    $userInfo->medical_name = $medInfo->name ?? null;
                    $userInfo->img = $medInfo->img ?? null;
                    $userInfo->license_proof = $medInfo->license_proof ?? null;
                    $userInfo->contact_no = $medInfo->contact_no ?? null;
                    $userInfo->about_us = $medInfo->about_us ?? null;
                    $userInfo->verifiedStatus = $medInfo->verifiedStatus ?? 0;
                }
            }
            
            return $userInfo;
        }
        
        return null;
    }
    
    // Helper method to check if request is AJAX
    private function isAjaxRequest() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}