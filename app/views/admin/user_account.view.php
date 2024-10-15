<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - User Accounts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/userAccounts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="user-accounts-section">
            <h2>User Accounts</h2>
            <div class="cards-container">
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Regular User</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Pet Merchant</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Adoption Shelters</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Care Service Providers</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Medical Providers</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card card-danger">
                    <div class="card-number">25</div>
                    <div class="card-title">Banned Users</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
            </div>
        </div>
    </div>