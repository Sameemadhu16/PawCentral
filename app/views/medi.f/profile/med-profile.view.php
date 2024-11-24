<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-profile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>

<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <?php include("../app/views/components/medical-sidebar/medicalSidebar.php"); ?>
        <h1>Medical profile</h1>
    </div>
</body>
</html>