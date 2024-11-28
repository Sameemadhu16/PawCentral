<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/profile.css"> <!-- Link to external CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div>
            <?php include("../app/views/components/shelter/sidebar.php"); ?>
        </div>

        <div class="container">
            <div class="profile-section">
                <h1>Shelter Profile</h1>
                <div class="profile-container">
                    <div class="profile-pic">
                    <img src="<?php echo ROOT; ?>/assets/images/user/default_user.jpg"  alt="Profile Picture">
                        <i class="fas fa-user-circle overlay-icon"></i>
                    </div>
                    <div class="profile-details">
                        <p><span>Name : </span>Sachith Avintha</p>
                        <!-- <p><span>UserId : </span>231243543255</p> -->
                        <p><span>Email : </span>sachith@gmail.com</p>
                        <p><span>Mobile No : </span>0712345678</p>
                    </div>

                    <div class="button-section">
                        <button class="logout-button">Log Out</button>
                        <button class="update-button">Update</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Optional interactivity for hover effects or menu interactions (if needed)
    </script>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>