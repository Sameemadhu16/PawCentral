<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="./assets/css/signUpPage.css">
    <link rel="stylesheet" href="./assets/css/fonts.css">
</head>
<body>
    <?php 
        include("../app/views/components/header2.php");
        $nextURL="";
    ?>
    <div class="container">
        <main>
            <section class="signup-hero">
                <h2>Find a pet</h2>
                <p>Get access to all the pet related services.</p>
                <span class="image-container">
                    <img src="<?= ROOT ?>/assets/images/signupdog.jpg" alt="Happy dog" class="pet-image">
                </span>
            </section>
            <section class="signup-form-section">
                <h2>Sign up now</h2>
                <form class="signup-form" method="POST ">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name">First name</label>
                            <input type="text" id="first-name" name="first-name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last name</label>
                            <input type="text" id="last-name" name="last-name" required>
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
                        <div class="form-row">
                            <label for="phone">Do you provide a service?</label>
                            <div class="isService-radio">
                                <div class="radio-button">
                                    <input type="radio" id="isService-no" name="isService" checked>No
                                </div>
                                <div class="radio-button">
                                    <input type="radio" id="isService-yes" name="isService">Yes
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">By creating an account, I agree to our Terms of use and Privacy Policy</label>
                    </div>
                    <div class="button-login-section">
                        <button type="submit" class="button" id="signup-button">Sign up</button>
                        <button class="button" id="next-button" style="display: none;"><a href="signup/signupnext">NEXT</a></button>
                        <p class="login-link">Already have an account? <a href="login">Log in</a></p>
                    </div>
                </form>
            </section>
        </main>
    </div>
    <!-- <script src="./assets/js/"></script> -->
</body>
</html>