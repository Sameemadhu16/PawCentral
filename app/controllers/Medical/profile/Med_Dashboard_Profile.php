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
        // Always set the content type to JSON for consistency
        header('Content-Type: application/json');
        
        try {
            // Log the request for debugging
            error_log("Update profile request received: " . json_encode($_POST));
            error_log("Files received: " . json_encode($_FILES));
            
            $user = new User();
            
            if (!isset($_SESSION['user']) || !$_SESSION['user']->id) {
                throw new Exception("User not authenticated.");
            }
            
            // Process form data
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'email' => trim($_POST['email'] ?? '')
            ];
            
            // Medical provider specific data
            $medData = [
                'name' => trim($_POST['medical_name'] ?? ''),
                'contact_no' => trim($_POST['contact_no'] ?? ''),
                'location' => trim($_POST['location'] ?? ''),
                'about_us' => trim($_POST['about_us'] ?? '')
            ];
            
            // Ensure contact_no is stored as a string
            if (isset($medData['contact_no']) && strlen($medData['contact_no']) > 0) {
                // Validate phone number format
                if (!preg_match('/^[0-9+\-\s()]*$/', $medData['contact_no'])) {
                    throw new Exception("Invalid phone number format. Please use 07xxxxxxxx format.");
                }
            }
            
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
                    $medData['img'] = $target_file;
                } else {
                    $error = error_get_last();
                    throw new Exception("Failed to upload file: " . ($error ? $error['message'] : 'Unknown error'));
                }
            }
            
            // Handle license proof upload
            if (isset($_FILES['license_proof']) && $_FILES['license_proof']['error'] == 0) {
                $target_dir = "uploads/license-proofs/";
                
                // Create directory if doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Generate unique filename
                $file_name = basename($_FILES['license_proof']['name']);
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $target_file = $target_dir . uniqid() . "." . $file_ext;

                // Validate file type
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
                if (!in_array($file_ext, $allowed_types)) {
                    throw new Exception("Only JPG, JPEG, PNG, GIF & PDF files are allowed for license proof.");
                }

                // Upload the file
                if (move_uploaded_file($_FILES['license_proof']['tmp_name'], $target_file)) {
                    $medData['license_proof'] = $target_file;
                } else {
                    $error = error_get_last();
                    throw new Exception("Failed to upload license proof: " . ($error ? $error['message'] : 'Unknown error'));
                }
            }

            // Update user profile in users table
            if (!$user->update($_SESSION['user']->id, $data)) {
                throw new Exception("User database update failed.");
            }
            
            // Update session with new user data
            $updatedUser = $user->first(['id' => $_SESSION['user']->id]);
            $_SESSION['user'] = $updatedUser;
            
            // Update medical provider specific data
            if (isset($_SESSION['role_id'])) {
                $medprov = new MedicalProvModel();
                
                // Log the data being sent to the medical provider update
                error_log("Updating medical provider with data: " . json_encode($medData));
                error_log("Medical provider ID: " . $_SESSION['role_id']);
                
                if (!$medprov->update($_SESSION['role_id'], $medData, 'med_id')) {
                    throw new Exception("Medical provider database update failed.");
                }
            } else {
                throw new Exception("Medical provider role not found.");
            }

            // Return success response
            $_SESSION['success'] = "Profile updated successfully!";
            
            // Always return JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Profile updated successfully',
                'redirect' => ROOT . '/medical-center/dashboard#profile'
            ]);

        } catch (Exception $e) {
            // Log the error
            error_log("Profile update error: " . $e->getMessage());
            
            // Set session error for page loads
            $_SESSION['error'] = $e->getMessage();
            
            // Return JSON error
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
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