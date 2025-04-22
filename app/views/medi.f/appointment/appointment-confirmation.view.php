<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/appointment-success.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="success-icon"></div>
        <h2>APPOINTMENT SUCCESS</h2>

        <!-- show success message -->
        <?php if(isset($_SESSION['appointment_success'])): ?>
            <div class="success-message">
                <?= $_SESSION['appointment_success']; ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <!-- show error message -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="buttons">
            <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="back">Book Another Appointment</button></a>
            <a href="<?=ROOT?>/userprofile/mypets" class="link-medi"><button class="book">View Appointments</button></a>
        </div>
    </div>
</body>
</html>