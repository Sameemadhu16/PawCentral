<!-- Update Profile Popup -->
<div id="profile-update-popup" class="popup-overlay">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>Update Profile</h2>
        <form id="update-profile-form" method="POST" enctype="multipart/form-data">
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
                <label for="mobile_no">Mobile Number</label>
                <input type="text" id="mobile_no" name="mobile_no" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->mobile_no) : '' ?>">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="<?= isset($profile) && is_object($profile) ? htmlspecialchars($profile->location) : '' ?>">
            </div>
            <div class="form-group">
                <label for="about">About Us</label>
                <textarea id="about" name="about" rows="4"><?= isset($profile) && is_object($profile) && !empty($profile->about) ? htmlspecialchars($profile->about) : 'We provide a wide variety of services including Vaccination, Consultation, Surgeries, Dental scaling, Microchipping and much more.' ?></textarea>
            </div>
            <div class="form-group">
                <label for="profile_pic">Profile Picture</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
                <small>Accepted formats: JPG, JPEG, PNG, GIF</small>
                <div class="image-preview-container"></div>
            </div>
            <div class="form-group">
                <input type="hidden" name="medical" value="1">
                <button type="submit" class="save-button">Save Changes</button>
            </div>
        </form>
    </div>
</div>
