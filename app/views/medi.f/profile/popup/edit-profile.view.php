<!-- Update Profile Popup -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div id="profile-update-popup" class="popup-overlay">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>Update Profile</h2>
        <form id="update-profile-form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="medical_name">Medical Center</label>
                <input type="text" id="medical_name" name="medical_name" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->medical_name) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->first_name) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->last_name) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->email) : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="contact_no">Mobile Number</label>
                <input type="text" id="contact_no" name="contact_no" maxlength="10" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->contact_no) : '' ?>">
                <small>Maximum 10 digits (e.g., 07XXXXXXXX)</small>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->location) : '' ?>">
            </div>
            <div class="form-group">
                <label for="about_us">About Us</label>
                <textarea id="about_us" name="about_us" rows="4"><?= isset($profile) && is_object($profile) && !empty($profile->about_us) ? htmlspecialchars($profile->about_us) : 'N/A' ?></textarea>
            </div>
            <div class="form-group">
                <label for="profile_pic">Profile Picture</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
                <small>Accepted formats: JPG, JPEG, PNG, GIF</small>
                <div class="image-preview-container"></div>
            </div>
            <div class="form-group">
                <input type="hidden" name="medical" value="1">
                <button type="submit" id="save-button" class="save-button">Save Changes</button>
            </div>
        </form>
    </div>
</div>
