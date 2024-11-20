<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signUpPage.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/errorMessage.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/signupLogin/signup.js" defer></script>
</head>

<body class="body">

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
                <h2>Sign up now</h2>

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

                <form class="signup-form" method="POST" action="<?= ROOT ?>/signup/submit">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <p class="password-hint">Use 8 or more characters with a mix of letters, numbers & symbols</p>
                    <div class="form-group">
                        <label>Do you provide a service?</label>
                        <div class="isService-radio">
                            <div class="radio-button">
                                <input type="radio" id="isService-no" name="is_service" value="no" checked>No
                            </div>
                            <div class="radio-button">
                                <input type="radio" id="isService-yes" name="is_service" value="yes">Yes
                            </div>
                        </div>
                    </div>
                    <div class="form-group checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">By creating an account, I agree to the Terms of use and Privacy Policy</label>
                    </div>
                    <div class="button-login-section">
                        <button type="submit" class="button" id="signup-button">Sign up</button>
                        <p class="login-link">Already have an account? <a href="<?= ROOT ?>/login">Log in</a></p>
                    </div>


                </form>



            </section>

        </main>
    </div>
</body>

</html>