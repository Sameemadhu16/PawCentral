<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/appointment-selectVet.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">

</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <h1>BOOK APPOINTMENT</h1>
        <h2>Select Veterinarian</h2>
        <form id="appointment-vet-form" method="POST" action="<?= ROOT ?>/medical-appointment-vet">
            <div class="vet-container">
                <?php
                    if(!empty($availableVets)) {
                        foreach($availableVets as $vet) {
                            echo "
                            <div class='vet-pill' onclick='selectVet(this)' data-vet-id='{$vet->vet_id}'>
                                <img src='{$vet->img}' alt='{$vet->name}'>
                                <div class='vet-info'>
                                    <h3>{$vet->name}</h3>
                                    <p>{$vet->experience} Years of experience</p>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p>No Available Veterinarians are found.</p>";
                    }
                ?>
            </div> 

            <!-- Hidden input fields to store selected vet -->
            <input type="hidden" name="vet_id" id="vet-input">

            <div class="buttons">
                <button type="button" class="back" onclick="history.back()">Back</button>
                <a href="<?=ROOT?>/medical-appointment-vet" class="link-medi"><button class="next" id="next-button">Next</button></a>
            </div>  
        </form>
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/appointment-selectVet.js"></script>
</body>
</html>