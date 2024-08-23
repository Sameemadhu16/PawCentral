<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Overview</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/overview.css">
</head>
<body>
    <!-- Include the Header and Sidebar Components -->
    <?php include("../app/views/components/header.php"); ?>
    
    <div class="main-container">
        <?php include("../app/views/components/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="overview">
                <div class="card">Announcements <span>15</span></div>
                <div class="card">Notices <span>15</span></div>
                <div class="card">Medical Registrations <span>15</span></div>
                <div class="card">Reports <span>15</span></div>
                <div class="card">User Accounts <span>25</span></div>
                <div class="card">Events <span>15</span></div>
                <div class="card">Donations <span>15</span></div>
                <div class="card">Posts <span>15</span></div>
            </div>
        </div>
    </div>
</body>
</html>
