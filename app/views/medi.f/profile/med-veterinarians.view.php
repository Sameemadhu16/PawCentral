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
        
    <!-- <div class="popup-overlay">
        <div class="popup-content">
            <div class="title">
                <h2>Add New Veterinarian</h2>
                <span class="close-btn">&times;</span>
            </div>
            <form id="add-vet-form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="vet-name">Name:</label>
                    <input type="text" id="vet-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="vet-experience">Experience (years):</label>
                    <input type="number" id="vet-experience" name="experience" required>
                </div>
                <div class="form-group">
                    <label for="vet-availability">Availability:</label>
                    <input type="text" id="vet-availability" name="availability" required>
                </div>
                <div class="form-group">
                    <label for="vet-image">Image URL:</label>
                    <input type="file" id="vet-image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="submit-btn" name="add-vet-submit-btn">Add Veterinarian</button>
            </form>
        </div>
    </div> -->
    
        <?php include("../app/views/medi.f/profile/popup/add-veterinarian.view.php"); ?>
        <?php if (isset($success_message)): ?>
                <div class="success-message">
                    <?= $success_message ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error-message">
                    <?= $error ?>
                </div>
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