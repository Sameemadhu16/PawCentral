<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-profile">

<body>
    <div class="container">
        <div class="profile-section">
            <h1>Profile</h1>
            <div class="profile-container">
                <div class="profile-pic-container">
                    <?php
                    $profile_image = isset($profile) && !empty($profile->profile_pic) 
                                    ? ROOT . '/' . $profile->profile_pic 
                                    : ROOT . '/assets/images/default-profile.png';
                    ?>
                    <div class="profile-pic">
                        <img src="<?= $profile_image ?>" alt="Profile Picture">
                        <div class="edit-overlay" id="change-photo-btn">
                            <i class="fas fa-camera"></i>
                            <span>Change Photo</span>
                        </div>
                    </div>
                </div>
                <div class="profile-details">
                    <p><span>Name : </span><?= isset($profile) && is_object($profile) && !empty($profile->first_name) ? htmlspecialchars($profile->first_name)." ".htmlspecialchars($profile->last_name) : 'N/A' ?></p>
                    <p><span>Email : </span><?= isset($profile) && is_object($profile) && !empty($profile->email) ? htmlspecialchars($profile->email) : 'N/A' ?></p>
                    <p><span>Mobile No : </span><?= isset($profile) && is_object($profile) && !empty($profile->mobile_no) ? htmlspecialchars($profile->mobile_no) : 'N/A' ?></p>
                    <p><span>Location : </span><?= isset($profile) && is_object($profile) && !empty($profile->location) ? htmlspecialchars($profile->location) : 'N/A' ?></p>
                    <p><span>About us : </span><span class="about_us"><?= isset($profile) && is_object($profile) && !empty($profile->about) ? htmlspecialchars($profile->about) : 'We provide a wide variety of services including Vaccination, Consultation, Surgeries, Dental scaling, Microchipping and much more.' ?></span></p>
                </div>

                <div class="button-section">
                    <button id="update-profile-btn" class="update-button btn btn-primary">Update Profile</button>
                </div>
            </div>
            <?php include("../app/views/medi.f/profile/popup/edit-profile.view.php"); ?>
        </div>
    </div>
</body>
</html>