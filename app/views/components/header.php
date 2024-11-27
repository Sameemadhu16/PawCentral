<header class="navbar font-inter">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">

    <div class="navbar-logo">
        <a href="home" class="navbar-link">
            <img src="<?= ROOT ?>/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo">
        </a>
        <!-- <img src="/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo"> -->
        <a href="<?= ROOT ?>/home" class="navbar-link navbar-text">
            <h1>PawCentral</h1>
        </a>
    </div>


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
        <li><a href="#">Medical Care</a></li>
        <li><a href="<?= ROOT ?>/eventsandcampaigns">Events</a></li>
        <li><a href="<?= ROOT ?>/services">Services</a></li>
        <li><a href="<?= ROOT ?>/shelters">home for a pet</a></li>
        <li><a href="<?= ROOT ?>/lostandfound">Lost & Found</a></li>
        <li><a href="<?= ROOT ?>/donationsnsupport">Support</a></li>

    </ul>

    <!-- User profile -->
    <div class="user-profile">

        <?php if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin'): ?>
            <a class="user-profile" href="<?= ROOT ?>/admin/overview">
                <img src="<?php echo ROOT . '/' . htmlspecialchars($_SESSION['user']->profile_pic); ?>">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user' && $_SESSION['user']->service_type == 'adoption-shelter'): ?>
            <a class="user-profile" href="<?= ROOT ?>/shelter/profile">
                <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg" class="loginlogo">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user' && $_SESSION['user']->service_type == 'medical-provider'): ?>
            <a class="user-profile" href="<?= ROOT ?>/medical-center/dashboard/profile">
                <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg" class="loginlogo">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user' && $_SESSION['user']->service_type == 'seller'): ?>
            <a class="user-profile" href="<?= ROOT ?>/service">
                <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg" class="loginlogo">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user' && $_SESSION['user']->service_type == 'care-service-provider'): ?>
            <a class="user-profile" href="<?= ROOT ?>/provider/profile">
                <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg" class="loginlogo">
            </a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role == 'user' && $_SESSION['user']->service_type == ''): ?>
            <a class="user-profile" href="<?= ROOT ?>/userprofile">
                <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg" class="loginlogo">
            </a>


        <?php else : ?>
            <a class="sign-in-button" href="login" style="text-decoration: none; padding: 10px 15px; font-size: 16px; color: #fff; background-color: orange; border-radius: 5px; border: none; display: inline-block; text-align: center; transition: background-color 0.3s ease;">
                Sign In
            </a>
        <?php endif; ?>
    </div>

</header>