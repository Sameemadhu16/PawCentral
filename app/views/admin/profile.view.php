<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Admin Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/profile.css"> <!-- Link to external CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div>
            <?php include("../app/views/components/admin/adminSidebar.php"); ?>
        </div>

        <div class="container">
            <div class="profile-section">
                <h1>Profile</h1>
                <div class="profile-container">
                    <div class="profile-pic">
                    <img src="<?php echo ROOT;?>/<?php echo $profile->profile_pic ?>">    
                    </div>
                    <div class="profile-details">
                        <p><span>Name : </span><?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->first_name)." ".htmlspecialchars($profile->last_name) : 'N/A' ?></p>
                        <p><span>Role : </span><?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->role) : 'N/A' ?></p>
                        <p><span>Email : </span><?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->email) : 'N/A' ?></p>
                        <p><span>Mobile No : </span><?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->mobile_no) : 'N/A' ?></p>
                    </div>

                    <div class="button-section">
                        <!-- <button class="logout-button">Log Out</button> -->
                        <form action="<?= ROOT ?>/admin/profile_view" method="post">
                            <button class="update-button" type="submit">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Optional interactivity for hover effects or menu interactions (if needed)
    </script>
</body>

</html>

