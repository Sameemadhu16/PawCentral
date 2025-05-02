<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Admin Dashboard - Profile</title>
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
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <div>
            <?php include("../app/views/components/admin/adminSidebar.php"); ?>
        </div>

        <div class="user-accounts-section">
            <div class="profile-section">
                <h1>My Profile</h1>
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

                    <!-- Profile Details -->
                    <div class="profile-details">
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">User Name : </span><?= !empty($profile->first_name) ? htmlspecialchars($profile->first_name) . " " . htmlspecialchars($profile->last_name) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Email : </span><?= !empty($profile->email) ? htmlspecialchars($profile->email) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Mobile No : </span><?= !empty($profile->mobile_no) ? htmlspecialchars($profile->mobile_no) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Location : </span><?= !empty($profile->location) ? htmlspecialchars($profile->location) : 'N/A' ?>
                        </div>
                        <div class="profile-detail-item">
                            <span class="profile-detail-item-label">Address : </span><?= !empty($profile->address) ? htmlspecialchars($profile->address) : 'N/A' ?>
                        </div>
                    </div>

                    <div class="button-section">
                        <button id="update-profile-btn" class="update-button btn btn-primary" onclick="openPopup()">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Edit Profile Information</h2>
            <form id="profileForm" action="<?= ROOT ?>/userprofile/update" method="POST" enctype="multipart/form-data">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?= !empty($profile->first_name) ? htmlspecialchars($profile->first_name) : '' ?>" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?= !empty($profile->last_name) ? htmlspecialchars($profile->last_name) : '' ?>" required>


                <label for="mobile_no">Mobile Number:</label>
                <input type="text" id="mobile_no" name="mobile_no" value="<?= !empty($profile->mobile_no) ? htmlspecialchars($profile->mobile_no) : '' ?>">

                <label for="location">Location:</label>
                <select name="location" id="location" required>
                    <option value="" disabled <?= empty($profile->location) ? 'selected' : '' ?>>Select your location</option>
                    <option value="Colombo" <?= $profile->location === 'Colombo' ? 'selected' : '' ?>>Colombo</option>
                    <option value="Kandy" <?= $profile->location === 'Kandy' ? 'selected' : '' ?>>Kandy</option>
                    <option value="Galle" <?= $profile->location === 'Galle' ? 'selected' : '' ?>>Galle</option>
                    <option value="Matara" <?= $profile->location === 'Matara' ? 'selected' : '' ?>>Matara</option>
                    <option value="Jaffna" <?= $profile->location === 'Jaffna' ? 'selected' : '' ?>>Jaffna</option>
                    <option value="Negombo" <?= $profile->location === 'Negombo' ? 'selected' : '' ?>>Negombo</option>
                    <option value="Anuradhapura" <?= $profile->location === 'Anuradhapura' ? 'selected' : '' ?>>Anuradhapura</option>
                    <option value="Trincomalee" <?= $profile->location === 'Trincomalee' ? 'selected' : '' ?>>Trincomalee</option>
                    <option value="Kurunegala" <?= $profile->location === 'Kurunegala' ? 'selected' : '' ?>>Kurunegala</option>
                    <option value="Ratnapura" <?= $profile->location === 'Ratnapura' ? 'selected' : '' ?>>Ratnapura</option>
                </select>

                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3"><?= !empty($profile->address) ? htmlspecialchars($profile->address) : '' ?></textarea>
                <!-- NEW: Profile Picture Upload -->
                <label for="profile_pic">Profile Picture:</label>
                <input type="file" name="profile_pic" id="profile_pic" accept="image/*">

                <!-- Preview -->
                <div id="imagePreviewContainer">
                    <?php if (!empty($profile->profile_pic)): ?>
                        <img src="<?= ROOT ?>/<?= htmlspecialchars($profile->profile_pic) ?>" alt="Current Profile Picture" style="max-width: 200px; margin-top: 10px;">
                    <?php endif; ?>
                </div>

                <!-- Preview Script -->
                <script>
                    document.getElementById('profile_pic').addEventListener('change', function() {
                        const previewContainer = document.getElementById('imagePreviewContainer');
                        previewContainer.innerHTML = ''; // Clear existing previews

                        Array.from(this.files).forEach(file => {
                            if (file.type.startsWith('image/')) {
                                const img = document.createElement('img');
                                img.src = URL.createObjectURL(file);
                                img.style.maxWidth = '200px';
                                img.style.marginTop = '10px';
                                previewContainer.appendChild(img);
                            }
                        });
                    });
                </script>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }

        // Handle form submission
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        alert('Profile updated successfully!');
                        window.location.reload();
                    } else {
                        alert(data.message || 'Error updating profile');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the profile. Please check the console for details.');
                });
        });
    </script>

    <?php include("../app/views/components/footer.php"); ?>

    <script>
        // Optional interactivity for hover effects or menu interactions (if needed)
    </script>
</body>

</html>