<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/appointment-selectpet.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">

</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <h1>BOOK APPOINTMENT</h1>
        <h2>Select Pet</h2>
        <div class="pet-container">
            <div class="pet-pill" onclick="selectPet(this)">
                <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Pet 1">
                <div class="pet-info">
                    <span>Pet Name</span>
                    <span>Age</span>
                </div>
            </div>
            <div class="pet-pill" onclick="selectPet(this)">
                <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Pet 1">
                <div class="pet-info">
                    <span>Pet Name</span>
                    <span>Age</span>
                </div>
            </div>
            <div class="pet-pill" onclick="selectPet(this)">
                <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Pet 1">
                <div class="pet-info">
                    <span>Pet Name</span>
                    <span>Age</span>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="back">Back</button></a>
            <a href="<?=ROOT?>/medical-appointment-reason" class="link-medi"><button class="next">Next</button></a>
        </div>  
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/appointment-selectpet.js"></script>
</body>
</html>