<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Medical Center Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile-spa.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-appointments.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-veterinarians.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/add-veterinarian.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/add-medicalRecord.css">    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-services.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-donations.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/med-profile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/service-add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="dashboard">
            <?php include("../app/views/components/medical-sidebar/medicalSidebar.php"); ?>
            <div class="page-window">
                <!-- Loading animation -->
                <div class="loading-animation">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <p>Loading...</p>
                </div>
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/profile/medical-profile-spa.js" defer></script>
</body>
</html>