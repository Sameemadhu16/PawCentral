<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile-spa.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="dashboard">
            <?php include("../app/views/components/medical-sidebar/medicalSidebar.php"); ?>
            <div class="page-window">
                <!-- Remove individual page divs and let the loadPage function handle content -->
            </div>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/profile/medical-profile-spa.js" defer></script>
</body>
</html>