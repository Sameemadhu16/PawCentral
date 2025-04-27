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
        <form id="appointment-pet-form" method="POST" action="<?= ROOT ?>/medical-appointment-pet">
            
            <!-- hidden pet input field -->
            <input type="hidden" name="pet_id" id="pet-input">

            <div class="pet-container">
                <?php
                    if(!empty($pets)) {
                        foreach($pets as $pet) {
                            echo "
                            <div class='pet-pill' onclick='selectPet(this)' data-pet-id='{$pet->pet_id}'>
                                <img src='{$pet->petimg}' alt='{$pet->name}'>
                                <div class='pet-info'>
                                    <h3>{$pet->name}</h3>
                                    <p>{$pet->species}</p>
                                    <p>{$pet->age} Years old</p>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p>No Pets are found.</p>";
                    }
                ?>
            </div>
            <div class="buttons">
                <button type="button" class="back" onclick="history.back()">Back</button>
                <a class="link-medi"><button class="next" id="next-button">Next</button></a>
            </div>  
        </form>
    </div>
    <script src="<?= ROOT ?>/assets/js/medical/appointment-selectPet.js"></script>
</body>
</html>