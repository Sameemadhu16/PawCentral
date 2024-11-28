<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class=".page-style-profile">
<body>
    <div class="container">
        <div class="profile-section">
            <h1>Profile</h1>
            <div class="profile-container">
                <div class="profile-pic">
                    <img src="<?= ROOT ?>/assets/images/sample.jpg" alt="Profile Picture">
                    <i class="fas fa-user-circle overlay-icon"></i>
                </div>
                <div class="profile-details">
                    <p><span>Name : </span>Sameera Madhuranga</p>
                    <p><span>UserId : </span>231243543255</p>
                    <p><span>Email : </span>sameeramadhu@gmail.com</p>
                    <p><span>Mobile No : </span>0712345678</p>
                </div>

                <div class="button-section">
                    <button class="logout-button">Log Out</button>
                    <button class="update-button">Update</button>
                </div>

            </div>
        </div>
    </div>
</body>
</html>