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
                        <img src="<?= ROOT ?>/assets/images/user.jpg" alt="Profile Picture">
                        <i class="fas fa-user-circle overlay-icon"></i>
                    </div>

                    <form action="<?= ROOT ?>/admin/updateProfile" method="POST">
                        <div class="profile-details">
                            <p>
                                <label for="name"><span>Name: </span></label>
                                <input type="text" id="name" name="name" value="Sameera Madhuranga">
                            </p>
                            <p>
                                <label for="userid"><span>UserId: </span></label>
                                <input type="text" id="userid" name="userid" value="231243543255" readonly>
                            </p>
                            <p>
                                <label for="email"><span>Email: </span></label>
                                <input type="email" id="email" name="email" value="sameeramadhu@gmail.com">
                            </p>
                            <p>
                                <label for="mobile"><span>Mobile No: </span></label>
                                <input type="text" id="mobile" name="mobile" value="0712345678">
                            </p>
                        </div>

                        <div class="button-section">
                            <button type="submit" class="update-button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Optional interactivity for hover effects or menu interactions (if needed)
    </script>
</body>

</html>
