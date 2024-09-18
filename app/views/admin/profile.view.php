<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - User Accounts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="profile-section">
            <h2>Profile</h2>
            <div class="profile-container">
                <div class="profile-pic">
                    <img src="path_to_profile_image.jpg" alt="Profile Picture">
                    <i class="fas fa-user-circle overlay-icon"></i>
                </div>
                <div class="profile-details">
                    <p><span>Name: </span>Sameera Madhuranga</p>
                    <p><span>UserId: </span>231243543255</p>
                    <p><span>Email: </span>sameera@gmail.com</p>
                    <p><span>Mobile No: </span>0712345678</p>
                </div>
                <button class="logout-button">Log Out</button>
            </div>
        </div>
    </div>