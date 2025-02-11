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
        <div class="content-wrapper">
            <div class="add-button-div">
                <button class="add-vet-btn btn btn-primary" id="add-vet-btn">
                    Add Veterinarian
                </button>
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
                        <div class='vet-card card'>
                            <div class='vet-image'>
                                <img src='{$vet->img}' alt='{$vet->name}'>
                            </div>
                            <div class='vet-details'>
                                <h3>{$vet->name}</h3>
                                <p><strong>Experience:</strong> {$vet->experience}</p>
                                <p><strong>Availability:</strong> {$vet->availability}</p>
                                <div class='buttons-div'>
                                    <button class='edit-btn btn btn-primary' data-id='{$vet->vet_id}'>Edit</button>
                                    <button class='delete-btn btn btn-danger' data-id='{$vet->vet_id}'>Delete</button>
                                </div>
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