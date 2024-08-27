<header class="navbar">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
    <div class="navbar-logo">
    <img src="<?= ROOT ?>/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo">

        <!-- <img src="/assets/images/logo.svg" alt="PawCentral Logo" class="navbar-logo"> -->
        <h1>PawCentral</h1>
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
        <li><a href="#">Find a Pet</a></li>
        <li><a href="#">Awareness</a></li>
        <li><a href="#">Medical Care</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">home for a pet</a></li>
        <li><a href="#">Lost & Found</a></li>
    </ul>
    <div class="user-profile">
        <img src="<?= ROOT ?>/assets/images/unreg_user.png" alt="User Profile">
    </div>

</header>
