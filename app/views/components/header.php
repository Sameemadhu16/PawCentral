<header class="navbar font-inter">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">

    <div class="navbar-logo">
    <a href="home" class="navbar-link">
    <img src="<?= ROOT ?>/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo">
    </a>
        <!-- <img src="/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo"> -->
        <a href="<?=ROOT?>/home" class="navbar-link navbar-text"><h1>PawCentral</h1></a>
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
        <li><a href="#">Services</a></li>
        <li><a href="#">home for a pet</a></li>
        <li><a href="<?= ROOT ?>/lostandfound">Lost & Found</a></li>

    </ul>

    <!-- User profile -->
    <div class="user-profile">
        <a class="user-profile" href="signup">
            <img src="<?= ROOT ?>/assets/images/unreg_user.png" alt="User Profile">
        </a>
    </div>

</header>
