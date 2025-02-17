<?php

class Auth {
    use Controller;

    public function logout() {
        // Ensure proper content type is set before any output
        header('Content-Type: application/json');

        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        try {
            // Clear medical-specific session data
            unset($_SESSION['medical_user']);
            unset($_SESSION['user_type']);
            
            // Optional: destroy entire session
            session_destroy();

            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Logout failed']);
        }
        exit;
    }
}
