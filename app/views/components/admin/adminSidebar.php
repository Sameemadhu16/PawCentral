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
    redirect('login');
    exit; // Ensure no further code is executed after redirect
}
?>


<div class="sidebar" id="sidebar">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/adminSidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="<?= ROOT ?>/assets/js/admin/adminSidebar.js" defer></script>
    <ul>
        <li>
            <a href="../admin/overview" class="nav-link ">
                <i class="fas fa-tasks icon"></i>
                Overview
            </a>
        </li>
        <li>
            <a href="../admin/announcement" class="nav-link">
                <i class="fas fa-bullhorn icon">
                </i>Announcements
            </a>
        </li>

        <li>
            <a href="../admin/notification" class="nav-link">
                <i class="fas fa-bell icon"></i>
                Notifications
            </a>
        </li>


        <li>
            <a href="../admin/medical_registration" class="nav-link">
                <i class="fas fa-medkit icon">
                </i>Medical Registrations
            </a>
        </li>

        <li>
            <a href="../admin/user_account" class="nav-link">
                <i class="fas fa-users icon">
                </i>User Accounts
            </a>
        </li>
        <li>
            <a href="../admin/event" class="nav-link">
                <i class="fas fa-calendar-alt icon">
                </i>Events
            </a>
        </li>
        <li>
            <a href="../admin/post" class="nav-link">
                <i class="fas fa-pen-alt icon">
                </i>Posts
            </a>
        </li>
        <li>
            <a href="../admin/donation" class="nav-link">
                <i class="fas fa-hand-holding-usd icon">
                </i>Donations
            </a>
        </li>
        <li>
            <a href="../admin/profile" class="nav-link">
                <i class="fas fa-user icon">
                </i>Profile
            </a>
        </li>
    </ul>

    <div class="logout-tab">
        <a href="?action=logout" class="nav-link" action="">
            <i class="fas fa-sign-out-alt icon"></i>
            <span>Logout</span>
        </a>
    </div>
</div>

<script>
    document.getElementById("toggleSidebar").addEventListener("click", function() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("collapsed");
    });
</script>