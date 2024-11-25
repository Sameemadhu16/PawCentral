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
            <button class="add-vet-btn">Add Veterinarian</button>
        </div>
        <div class="vet-cards">
        <div class="vet-card">
                <div class="vet-details">
                    <h3>Dr. John Doe</h3>
                    <p>Specialty: Surgery</p>
                    <p>Experience: 10 years</p>
                    <div class="buttons-div">
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </div>
                </div>
                <div class="vet-image">
                    <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Dr. John Doe">
                </div>
            </div>
            <div class="vet-card">
                <div class="vet-details">
                    <h3>Dr. Jane Smith</h3>
                    <p>Specialty: Dermatology</p>
                    <p>Experience: 8 years</p>
                    <div class="buttons-div">
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </div>
                </div>
                <div class="vet-image">
                    <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Dr. John Doe">
                </div>
            </div>

            <div class="vet-card">
                <div class="vet-details">
                    <h3>Dr. Jane Smith</h3>
                    <p>Specialty: Dermatology</p>
                    <p>Experience: 8 years</p>
                    <div class="buttons-div">
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </div>
                </div>
                <div class="vet-image">
                    <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Dr. John Doe">
                </div>
            </div>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/js/medical/profile/med-veterinarians.js"></script>
</body>
</html>