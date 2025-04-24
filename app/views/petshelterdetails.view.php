<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/profile.css"> <!-- Link to external CSS -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php");
    // show($data);
    ?>

    <div class="main-container container">
        <div class="user-accounts-section">
            <div class="profile-section">
                <div class="profile-container">
                    <div class="profile-pic-container">
                        <?php
                        $profile_image = !empty($profile->profile_pic)
                            ? ROOT . '/' . esc($profile->profile_pic)
                            : ROOT . '/assets/images/user/default_user.jpg';
                        ?>
                        <div class="profile-pic">
                            <img src="<?= $profile_image ?>" alt="Profile Picture">
                            <div class="edit-overlay" id="change-photo-btn">
                                <i class="fas fa-camera"></i>
                                <span>Change Photo</span>
                            </div>
                        </div>
                    </div>

                    <?php $shelter = $data['shelter'] ?>
                    <!-- Profile Details -->
                    <div class="profile-details">
                        <!-- User Profile Details -->
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Shelter Name: </span><?= !empty($shelter->name) ? htmlspecialchars($shelter->name) : 'N/A' ?>
                        </div>
                        <!-- Shelter Details -->
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Shelter Location: </span><?= !empty($shelter->location) ? htmlspecialchars($shelter->location) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Contact No: </span><?= !empty($shelter->contact_no) ? htmlspecialchars($shelter->contact_no) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Capacity: </span><?= !empty($shelter->capacity) ? htmlspecialchars($shelter->capacity) : 'N/A' ?>
                        </div>

                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Description: </span><?= !empty($shelter->description) ? htmlspecialchars($shelter->description) : 'N/A' ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    

    <?php include("../app/views/components/footer.php"); ?>

</body>

</html>