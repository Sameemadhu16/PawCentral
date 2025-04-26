<header class="navbar font-inter">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">

    <a href="<?= ROOT ?>" class="navbar-logo-set">
        <img src="<?= ROOT ?>/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo">
        <h1>PawCentral</h1>
    </a>

    <script>
        // To mark the currently selected tab
        function toggleNavbar() {
            const navbarLinks = document.querySelector('.navbar-links');
            navbarLinks.classList.toggle('active');
        }
    </script>


    <!-- Hamburger Menu Icon -->
    <div class="navbar-toggle" onclick="toggleNavbar()">
        <span class="hamburger"></span>
        <span class="hamburger"></span>
        <span class="hamburger"></span>
    </div>

    <!-- FILTER THE TABS BASED ON THE USER ROLE ACCESSES -->
    <ul class="navbar-links">
        <li><a href="<?= ROOT ?>/findapet">Find a Pet</a></li>
        <li><a href="<?= ROOT ?>/announcements">Awareness</a></li>
        <li><a href="<?= ROOT ?>/medical-centers">Medical Care</a></li>
        <li><a href="<?= ROOT ?>/eventsandcampaigns">Events</a></li>
        <li><a href="<?= ROOT ?>/services">Services</a></li>
        <li><a href="<?= ROOT ?>/shelters">Home for a pet</a></li>
        <li><a href="<?= ROOT ?>/lostandfound">Lost & Found</a></li>
        <li><a href="<?= ROOT ?>/donationsnsupport">Support</a></li>
    </ul>



    <!-- Notification indicator -->


    <!-- User profile -->
    <div class="user-profile" style="flex-direction: row; display:flex;">


        <?php if (isset($_SESSION['user'])): ?>
            <!-- Notification indicator -->
            <div class="notification-icon" style="padding:0; margin:4px; margin-left:20px; font-size:large" 
                onclick="window.location.href='<?php 
                    if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin') {
                        echo ROOT . '/admin/notifications';
                    } elseif (isset($_SESSION['user']) && $_SESSION['user_role'] == 'shelter') {
                        echo ROOT . '/shelter/notifications';
                    } elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'medical_provider') {
                        echo ROOT . '/medical-center/notifications';
                    } elseif (isset($_SESSION['user']) && $_SESSION['user_role'] == 'seller') {
                        echo ROOT . '/merchant/notifications';
                    } elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'service_prov') {
                        echo ROOT . '/provider/notifications';
                    } elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user') {
                        echo ROOT . '/userprofile/notifications';
                    } else {
                        echo ROOT . '/login';
                    }
                ?>'">
                🔔 <span id="notif-count" class="badge">0</span>
            </div>
            <?php if (!isset($_GET['action']) || $_GET['action'] !== 'logout'): ?>
                <?php require_once 'notification_script.php'; ?>
            <?php endif; ?>
        <?php endif; ?>



        <?php if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin'): ?>
            <a class="user-profile" href="<?= ROOT ?>/admin/overview">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user_role'] == 'shelter'): ?>
            <a class="user-profile" href="<?= ROOT ?>/shelter/profile">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'medical_provider'): ?>
            <a class="user-profile" href="<?= ROOT ?>/medical-center/dashboard">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user_role'] == 'seller'): ?>
            <a class="user-profile" href="<?= ROOT ?>/service">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'service_prov'): ?>
            <a class="user-profile" href="<?= ROOT ?>/provider/profile">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user'): ?>
            <a class="user-profile" href="<?= ROOT ?>/userprofile">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>


        <?php else : ?>
            <a class="sign-in-button" href="<?= ROOT ?>/login" style="text-decoration: none; padding: 10px 15px; font-size: 16px; color: #fff; background-color: orange; border-radius: 5px; border: none; display: inline-block; text-align: center; transition: background-color 0.3s ease;">
                Sign In
            </a>
        <?php endif; ?>

    </div>

</header>