<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-veterinarians">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="add-button-div">
            <button class="add-vet-btn" id="add-vet-btn">Add Veterinarians</button>
        </div>
        <?php include("../app/views/medi.f/profile/popup/add-veterinarian.view.php"); ?>
        <div class="vet-cards">
        <?php 
            if(!empty($veterinarians)) {
                foreach($veterinarians as $vet) {
                    echo "
                    <div class='vet-card'>
                        <div class='vet-details'>
                            <h3>{$vet->name}</h3>
                            <p>Experience: </br>{$vet->experience} years</p>
                            <p>Availability: </br>{$vet->availability}</p>
                            <div class='buttons-div'>
                                <button class='edit-btn'>Edit</button>
                                <button class='delete-btn'>Delete</button>
                            </div>
                        </div>
                        <div class='vet-image'>
                            <img src='{$vet->image_url}' alt='{$vet->name}'>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No veterinarians found.</p>";
            }
        ?>
        </div>
    </div>
</body>
</html>