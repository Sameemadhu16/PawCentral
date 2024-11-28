<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/appointment-reason.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <h1>BOOK APPOINTMENT</h1>
        <h2>APPOINTMENT REASON</h2>
        <textarea name="appointment_reason" id="appointment_reason_id" class="font-inter"></textarea>

        <div class="buttons">
            <a href="<?=ROOT?>/medical-appointment-selectpet" class="link-medi"><button class="back">Back</button></a>
            <a href="<?=ROOT?>/medical-center" class="link-medi"><button class="book">Book Appointment</button></a>
        </div> 
    </div>
</body>
</html>