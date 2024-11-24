<div class="sidebar" id="sidebar">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/adminSidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="<?= ROOT ?>/assets/js/admin/adminSidebar.js" defer></script>
    <ul>
        <li>
            <a href="../shelter/profile" class="nav-link">
                <i class="fas fa-user icon"></i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a href="../shelter/adoption_requests" class="nav-link">
                <i class="fas fa-list icon"></i>
                <span>Adoption requests</span>
            </a>
        </li>
        <li>
            <a href="../shelter/requests_to_adopt" class="nav-link">
                <i class="fas fa-tasks icon"></i>
                <span>Requests to adopt</span>
            </a>
        </li>
        <li>
            <a href="../shelter/event" class="nav-link">
                <i class="fas fa-calendar-check icon"></i>
                <span>Events</span>
            </a>
        </li>
        <li>
            <a href="../shelter/post" class="nav-link">
                <i class="fas fa-blog icon"></i>
                <span>Posts (adoptions)</span>
            </a>
        </li>
        <li>
            <a href="../shelter/donation" class="nav-link">
                <i class="fas fa-donate icon"></i>
                <span>Donations</span>
            </a>
        </li>
        <li>
            <a href="../shelter/sell_pets" class="nav-link">
                <i class="fas fa-store icon"></i>
                <span>SELL Pets?</span>
            </a>
        </li>
    </ul>

    <div class="logout-tab">
        <a href="../logout" class="nav-link">
            <i class="fas fa-sign-out-alt icon"></i>
            <span>Logout</span>
        </a>
    </div>
</div>

<script>
    document.getElementById("toggleSidebar").addEventListener("click", function () {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("collapsed");
    });
</script>
