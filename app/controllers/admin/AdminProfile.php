<?php

/**
 * AdminProfile Controller
 * Handles displaying the admin profile information
 */
class AdminProfile{
    // Include Controller trait for common functionality
    use Controller;

    /**
     * Main index method
     * Retrieves and displays the admin profile
     */
    public function index(){
        // Get the current admin's profile data
        $status = $this->getProfile();
        // Render the profile view with the retrieved data
        $this->view('admin/profile', ['profile' => $status]);
    }

    /**
     * Private method to fetch profile information
     * @return object|null Returns user data if found
     */
    private function getProfile(){
        // Get current user's ID from session
        $id = $_SESSION['user']->id;
        
        if($id){
            // Create new User model instance
            $user = new User();
            // Fetch user data based on ID
            $userUpdate = $user->first(['id'=>$id]);
            return $userUpdate;
        }
    }
}