<header class="navbar font-inter">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <a href="<?= ROOT?>" class="navbar-logo-set">
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
        <li><a href="#">Find Pet</a></li>
        <li><a href="#">Awareness</a></li>
        <li><a href="#">Medical</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Find a home</a></li>
        <li><a href="#">Lost & Found</a></li>
    </ul>
    <a class="user-profile" href="signup">
        <img src="<?= ROOT ?>/assets/images/unreg_user.png" alt="User Profile">
    </a>

</header>
