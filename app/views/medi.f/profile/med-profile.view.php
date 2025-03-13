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
                    $profile_image = !empty($profile->img) 
                                    ? ROOT . '/' . $profile->img 
                                    : ROOT . '/assets/images/shop.png';
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
                        <span class="profile-detail-item-label">Medical Center : </span><?= !empty($profile->medical_name) ? htmlspecialchars($profile->medical_name) : 'N/A' ?>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">User Name : </span><?= !empty($profile->first_name) ? htmlspecialchars($profile->first_name)." ".htmlspecialchars($profile->last_name) : 'N/A' ?>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">Email : </span><?= !empty($profile->email) ? htmlspecialchars($profile->email) : 'N/A' ?>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">Mobile No : </span><?= !empty($profile->contact_no) ? htmlspecialchars($profile->contact_no) : 'N/A' ?>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">Location : </span><?= !empty($profile->location) ? htmlspecialchars($profile->location) : 'N/A' ?>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">Verification Status : </span> 
                        <div class="license-proof-container">
                            <?php if(!empty($profile->license_proof)): ?>
                                <a href="<?= ROOT . '/' . $profile->license_proof ?>" target="_blank" class="license-link">
                                    <i class="fas fa-file-alt"></i><span>View License</span>
                                </a>
                            <?php else: ?>
                                <div class="license-link"><span>No license uploaded</span></div>
                            <?php endif; ?>
                        </div>
                        <div class="verification-status">
                            <?php if(isset($profile->verifiedStatus) && $profile->verifiedStatus == 'approved'): ?>
                                <span class="status-verified"><i class="fas fa-check-circle"></i><span>Approved</span></span>
                            <?php elseif($profile->verifiedStatus == 'pending'): ?>
                                <span class="status-pending"><i class="fas fa-clock"></i><span>Pending</span></span>
                            <?php elseif($profile->verifiedStatus == 'rejected'): ?>
                                <span class="status-rejected"><i class="fas fa-times-circle"></i><span>Rejected</span></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="profile-detail-item">
                        <span class="profile-detail-item-label">About us : </span> <?= !empty($profile->about_us) ? htmlspecialchars($profile->about_us) : 'N/A' ?>
                    </div>
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