<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/mypets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>
    
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
        
        <div class="user-accounts-section">
            <div class="profile-section">
                <h1><?= strtoupper(htmlspecialchars($pet->name)) ?></h1>
                <div class="profile-container">
                    <!-- Pet Image Section -->
                    <div class="profile-pic-container">
                        <div class="profile-pic">
                            <img src="<?=esc($pet->petimg)?>" alt="<?= htmlspecialchars($pet->name) ?>">
                            <!-- <div class="edit-overlay" id="change-photo-btn">
                                <i class="fas fa-camera"></i>
                                <span>Change Photo</span>
                            </div> -->
                        </div>
                    </div>

                    <!-- Pet Details Section -->
                    <div class="profile-details">
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Name:</span>
                            <span class="profile-detail-item-value"><?= htmlspecialchars($pet->name) ?></span>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Species:</span>
                            <span class="profile-detail-item-value"><?= htmlspecialchars($pet->species) ?></span>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Breed:</span>
                            <span class="profile-detail-item-value"><?= htmlspecialchars($pet->breed) ?></span>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Sex:</span>
                            <span class="profile-detail-item-value"><?= htmlspecialchars($pet->sex) ?></span>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Age:</span>
                            <span class="profile-detail-item-value">
                                <?php
                                    $birthDate = new DateTime($pet->birth_date); // Changed from bdate to birth_date based on model
                                    $today = new DateTime();
                                    $age = $birthDate->diff($today);
                                    if($age->y > 0) {
                                        echo $age->y . " year" . ($age->y > 1 ? "s" : "");
                                    } else if($age->m > 0) {
                                        echo $age->m . " month" . ($age->m > 1 ? "s" : "");
                                    } else {
                                        echo $age->d . " day" . ($age->d > 1 ? "s" : "");
                                    }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- Health Information Section -->
                    <div class="health-section">
                        <h2>Health Information</h2>
                        <div class="health-stats">
                            <div class="health-stat-item">
                                <span class="stat-label">Height</span>
                                <span class="stat-value"><?= htmlspecialchars($pet->height) ?> cm</span>
                            </div>
                            <div class="health-stat-item">
                                <span class="stat-label">Weight</span>
                                <span class="stat-value"><?= htmlspecialchars($pet->weight) ?> kg</span>
                            </div>
                            <div class="health-stat-item">
                                <span class="stat-label">Neutered</span>
                                <span class="stat-value">
                                    <?php if($pet->nuetered == 1): ?>
                                        <i class="fas fa-check" style="color: #28a745;"></i> Yes
                                    <?php else: ?>
                                        <i class="fas fa-times" style="color: #dc3545;"></i> No
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="button-section">
                        <button id="update-profile-btn" class="update-button" onclick="openPopup()">Update Pet Profile</button>
                    </div> -->
                    <div class="button-section">
                        <button id="update-profile-btn" class="update-button" onclick="window.location.href='<?=ROOT?>/userprofile/mypets/Pet_medrecords?id=<?=esc($pet->pet_id)?>'">See Medical Records</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html> 