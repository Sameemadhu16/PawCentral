<div class="sidebar" id="sidebar">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/adminSidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="<?= ROOT ?>/assets/js/admin/adminSidebar.js" defer></script>
    <ul>
        <li>
            <a href="../admin/overview" class="nav-link ">
                <i class="fas fa-tasks icon"></i>
                Notifications
            </a>
        </li>
        <li>
            <a href="../admin/medical_registration" class="nav-link">
                <i class="fas fa-medkit icon">
                </i>My Pets
            </a>
        </li>
        <li>
            <a href="../admin/event" class="nav-link">
                <i class="fas fa-calendar-alt icon">
                </i>Events
            </a>
        </li>
        <li>
            <a href="../shelter/lost_and_found" class="nav-link">
                <i class="fas fa-tags icon"></i>
                <span>Lost & Found</span>
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
</div>

<script>
    document.getElementById("toggleSidebar").addEventListener("click", function() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("collapsed");
    });
</script>