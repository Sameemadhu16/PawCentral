<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/donation_card.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include only the header -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="content">
            <h2>Donation Details</h2>
            <div class="donation-card-detail">
                <div class="donor-info">
                    <h3>Donor Information</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. This section provides an overview of the donor's personal details and their contribution.</p>
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>Phone:</strong> +94 771234567</p>
                </div>

                <div class="donation-info">
                    <h3>Donation Information</h3>
                    <p><strong>Society:</strong> Animal Welfare Society</p>
                    <p><strong>Donation Amount:</strong> 10,000 LKR</p>
                    <p><strong>Date:</strong> 2024-11-16</p>
                </div>

                <div class="donation-actions">
                    <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=1'">Approve</button>
                    <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=1'">Reject</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
