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
        <div class="content-wrapper">  <!-- Added wrapper div -->
            <div class="add-button-div">
                <button class="add-vet-btn" id="add-vet-btn">Add Veterinarians</button>
            </div>
            <?php include("../app/views/medi.f/profile/popup/add-veterinarian.view.php"); ?>
            <!-- responds -->
            <?php if (isset($success_message)): ?>
                <div class="success-message"><?= $success_message ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error-message"><?= $error ?></div>
            <?php endif; ?>
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
                                    <button class='edit-btn' data-id='{$vet->id}'>Edit</button>
                                    <button class='delete-btn' data-id='{$vet->id}'>Delete</button>
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
            <?php include("../app/views/medi.f/profile/popup/edit-veterinarian.view.php");?>
            <?php include("../app/views/components/deleteConfirmation.php");?>
        </div>
    </div>
</body>
</html>