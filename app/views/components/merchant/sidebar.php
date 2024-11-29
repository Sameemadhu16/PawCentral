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
            <a href="<?=ROOT?>/service" class="nav-link">
                <i class="fas fa-blog icon"></i>
                <span>Post Pet</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/merchant/profile" class="nav-link">
                <i class="fas fa-user icon"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- <li>
            <a href="../shelter/adoption_requests" class="nav-link">
                <i class="fas fa-list icon"></i>
                <span>Adoption requests</span>
            </a>
        </li> -->
        <li>
            <a href="<?=ROOT?>/merchant/notification" class="nav-link">
                <i class="fas fa-bell icon"></i>
                Notifications
            </a>
        </li>

        <!-- <li>
            <a href="../shelter/requests_to_adopt" class="nav-link">
                <i class="fas fa-tasks icon"></i>
                <span>Requests to adopt</span>
            </a>
        </li> -->
        <!-- <li>
            <a href="../shelter/event" class="nav-link">
                <i class="fas fa-calendar-check icon"></i>
                <span>Events</span>
            </a>
        </li> -->

        
        <!-- <li>
            <a href="../shelter/sell_pets" class="nav-link">
                <i class="fas fa-store icon"></i>
                <span>SELL Pets?</span>
            </a>
        </li> -->
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