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
            <!-- <?php include("../app/views/components/admin/adminSidebar.php"); ?> -->
        </div>

        <div class="container">
            <div class="profile-section">
                <h1>Profile</h1>
                <div class="profile-container">
                    

                    <form method="POST"  enctype="multipart/form-data">
                    <div class="profile-pic">
                        <input type="file" id="file" style="display: none;" name="profile_pic" accept="images/*">

                        <img src="<?php echo isset($_SESSION['user']->profile_pic) && !empty($_SESSION['user']->profile_pic)
                                        ? htmlspecialchars($_SESSION['user']->profile_pic)
                                        : ROOT . '/assets/images/unreg_user.png'; ?>" class="profileimg" id="profileImage"
                            alt="Profile" style="cursor: pointer;">
                        <!-- <i class="fas fa-user-circle overlay-icon"></i> -->
                    </div>
                        <div class="profile-details">
                            <p>
                                <label for="name"><span>Name: </span></label>
                                <input type="text" id="name" name="name" value="<?php echo esc($_SESSION['user']->first_name) . " " . esc($_SESSION['user']->last_name) ?>">
                            </p>
                            <p>
                                <label for="userid"><span>Role: </span></label>
                                <input type="text" id="userRole" name="userRole" value="<?php echo esc($_SESSION['user']->role) ?>" readonly>
                            </p>
                            <p>
                                <label for="email"><span>Email: </span></label>
                                <input type="email" id="email" name="email" value="<?php echo esc($_SESSION['user']->email) ?>">
                            </p>
                            <p>
                                <label for="mobile"><span>Mobile No: </span></label>
                                <input type="text" id="mobile" name="mobile" value="<?php echo esc($_SESSION['user']->mobile_no) ?>">
                            </p>
                        </div>

                        <div class="button-section">
                            <button type="submit" class="update-button" name="admin">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the image and file input elements
        const profileImage = document.getElementById('profileImage');
        const fileInput = document.getElementById('file');

        // Add click event listener to the image
        profileImage.addEventListener('click', () => {
            // Trigger the file input click
            fileInput.click();
        });

        // Add change event listener to the file input
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0]; // Get the selected file

            if (file) {
                // Check if the file is an image
                if (file.type.startsWith('image/')) {
                    // Create a FileReader to read the file and preview it
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        // Set the image src to the uploaded file
                        profileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file); // Read the file as a Data URL
                } else {
                    alert('Please upload a valid image file.');
                }
            }
        });
        // Optional interactivity for hover effects or menu interactions (if needed)
    </script>
</body>

</html>