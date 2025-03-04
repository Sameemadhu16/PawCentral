<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signUpPageNext.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/errorMessage.css">
</head>

<body>
    <?php include("../app/views/components/header2.php"); ?>

    <div class="container">
        <main>
            <section class="signup-hero">
                <h2>Find a pet</h2>
                <p>Get access to all the pet-related services.</p>
                <span class="image-container">
                    <img src="<?= ROOT ?>/assets/images/signupdog.jpg" alt="Happy dog" class="pet-image">
                </span>
            </section>
            <section class="signup-form-section">
                <div class="signup-head">
                    <h2>Sign up now</h2>
                    <a href="<?= ROOT ?>/signup" class="back-button">
                        <span class="arrow">&#8592;</span>
                        <span class="text">Back</span>
                    </a>
                </div>

                <!-- Display error messages -->
                <?php if (!empty($errors)): ?>
                    <div class="error-messages-container">
                        <?php foreach ($errors as $error): ?>
                            <p class="error-message-item">
                                <i class="fas fa-exclamation-circle"></i>
                                <?= htmlspecialchars($error) ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form class="signup-form" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="service_type">What service do you provide?</label>
                            <div class="dropdown">
                                <select id="service_type" name="service_type" required>
                                    <option value="" disabled selected>Select a service</option>
                                    <option value="medical_provider">Medical Provider</option>
                                    <option value="seller">Seller - Pet seller, Pet renter, Animal breeding and Pet importer</option>
                                    <option value="shelter">Adoption Shelter</option>
                                    <option value="service-prov">Care Service Provider - Pet transporter and Pet sitter</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Name of the service</label>
                            <input type="text" id="service_name" name="service_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="fileUpload">Proof of service(for only medical provider)</label>
                        <input type="file" id="fileUpload" name="proof">
                    </div>

                    <div class="form-group checkbox">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">By creating an account, I agree to our Terms of use and Privacy Policy</label>
                    </div>
                    <div class="button-login-section">
                        <button type="submit" class="button" name="stepTwoSubmit" id="signup-button">Sign up</button>
                        <p class="login-link">Already have an account? <a href="<?= ROOT ?>/login">Log in</a></p>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>

</html>