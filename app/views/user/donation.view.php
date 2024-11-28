<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/donation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>

        <div class="content">
            <div class="header-section">
                <h2>Donation requests</h2>
                <button class="ask-support-button">Ask for support</button>
            </div>

            <div class="donation-section">
                <div class="donation-card">
                    <div class="icon-section">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="details-section">
                        <h3>For Tiny’s medical expenses</h3>
                        <div class="progress-bar">
                            <span class="progress" style="width: 10%; background-color: #F4A261;"></span>
                        </div>
                        <p>Rs. 2500 collected / Rs. 25000</p>
                    </div>
                    <button class="remove-request-button">Remove request</button>
                </div>

                <div class="donation-card">
                    <div class="icon-section">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="details-section">
                        <h3>For Tiny’s medical expenses</h3>
                        <div class="progress-bar">
                            <span class="progress" style="width: 5%; background-color: #F4A261;"></span>
                        </div>
                        <p>Rs. 1250 collected / Rs. 25000</p>
                    </div>
                    <button class="remove-request-button">Remove request</button>
                </div>

                <div class="donation-card">
                    <div class="icon-section">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="details-section">
                        <h3>For Tiny’s medical expenses</h3>
                        <div class="progress-bar">
                            <span class="progress" style="width: 20%; background-color: #F4A261;"></span>
                        </div>
                        <p>Rs. 5000 collected / Rs. 25000</p>
                    </div>
                    <button class="remove-request-button">Remove request</button>
                </div>

                <div class="donation-card">
                    <div class="icon-section">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="details-section">
                        <h3>For Tiny’s medical expenses</h3>
                        <div class="progress-bar">
                            <span class="progress" style="width: 5%; background-color: #F4A261;"></span>
                        </div>
                        <p>Rs. 1250 collected / Rs. 25000</p>
                    </div>
                    <button class="remove-request-button">Remove request</button>
                </div>
            </div>

        </div>

    </div>
</body>

</html>