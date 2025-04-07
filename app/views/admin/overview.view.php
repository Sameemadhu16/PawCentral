<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Overview</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/overview.css">
</head>

<body class="body">
    <!-- Include the Header and Sidebar Components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="container main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="overview" method="POST">
                <div class="card">Announcements <span><?= esc($announcementCount) ?></span></div>
                <div class="card">Medical Registrations <span><?= esc($mediRegCount) ?></span></div>
                <div class="card">User Accounts <span><?= esc($userCount) ?></span></div>
                <div class="card">Events <span><?=esc($eventCount) ?></span></div>
                <div class="card">Donations<span><?= esc($donationCount) ?></span></div>
                <div class="card">Posts <span>15</span></div>
                <div class="card">
                    Reports
                    <button class="generate-button" onclick="generateReport()">Generate</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>

<script>
    function generateReport() {
        alert("Report generation in progress...");
        // Add logic for generating the report
    }
</script>