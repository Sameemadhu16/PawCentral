<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile-spa.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-appointments.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-veterinarians.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/add-veterinarian.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-services.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-donations.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="dashboard">
            <?php include("../app/views/components/medical-sidebar/medicalSidebar.php"); ?>
            <div class="page-window">
                <!-- load page -->
            </div>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/profile/medical-profile-spa.js" defer></script>
</body>
</html>