<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="./assets/css/signUpPage.css">
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/errorMessage.css">
    <script src="<?= ROOT ?>/assets/js/signupLogin/signup.js" defer></script>
</head>

<body>
    <?php
    include("../app/views/components/header3.php");
    $nextURL = "";
    ?>
    <div class="container">
        <main>

            <section class="signup-hero">
                <h2>Find a pet</h2>
                <p>Get access to all the pet related services.</p>
                <span class="image-container">
                    <img src="./assets/images/signupdog.jpg" alt="Happy dog" class="pet-image">
                </span>
            </section>

            <section class="signup-form-section">
                <div class="signup-head">
                    <h2>Sign In</h2>
                </div>

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

                <form class="signup-form" method="POST" >
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" >
                    </div>
                    <div class="form-group checkbox">
                        <input type="checkbox" id="remember" name="remember" >
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="button-login-section">
                        <button type="submit" class="button" name="login" id="button">Sign In</button>
                        <p class="login-link">Don't have an account? <a href="signup">Register</a></p>
                    </div>
                </form>
            </section>
        </main>
    </div>
    <script src="./assets/js/signup.js"></script>
</body>

</html>