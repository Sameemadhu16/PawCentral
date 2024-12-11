<?php
// Start the session to enable session management
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Logout functionality
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Unset all of the session variables
    $_SESSION = array();
    unset($_SESSION['user']);

    // Destroy the session
    session_destroy();

    // Redirect to the login page or homepage
    // redirect('');
    exit; // Ensure no further code is executed after redirect
}
?>
<!-- <body data-page="profile"> -->
    <div class="sidebar" id="sidebar">
        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medicalSidebar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="<?= ROOT ?>/assets/js/medical/profile/medicalSidebar.js" defer></script>

        <ul>
            <li>
                <a href="#profile" class="nav-link active" data-page="profile">
                    <i class="fas fa-user icon"></i>
                    Profile
                </a>
            </li>
            <li>
                <a href="#appointments" class="nav-link" data-page="appointments">
                    <i class="fas fa-bullhorn icon"></i>
                    Appointments
                </a>
            </li>
            <li>
                <a href="#veterinarians" class="nav-link" data-page="veterinarians">
                    <i class="fas fa-user-md icon"></i>Veterinarians
                </a>
            </li>
            <li>
                <a href="#services" class="nav-link" data-page="services">
                    <i class="fas fa-stethoscope icon"></i>Services
                </a>
            </li>
            <li>
                <a href="#notification" class="nav-link" data-page="notification">
                    <i class="fas fa-bell icon"></i>Notifications
                </a>
            </li>
            <!-- <li>
                <a href="#" class="nav-link" data-page="events">
                    <i class="fas fa-calendar-alt icon"></i>Events
                </a>
            </li> -->
            <li>
                <a href="#donations" class="nav-link" data-page="donations">
                    <i class="fas fa-heart icon"></i>Donations 
                </a>
            </li>
            <li class="logout-tab">
                <a class="nav-link" action="">
                    <i class="fas fa-sign-out-alt icon"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    
<!-- </body> -->