<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - User Accounts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/userAccounts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="user-accounts-section">
            <h2>User Accounts</h2>

            <!-- Overview Cards Section -->
            <div class="cards-container" >
                <div class="card">
                    <div class="card-number"><?= esc($regular) ?></div>
                    <div class="card-title">Regular User</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number"><?= esc($seller) ?></div>
                    <div class="card-title">Seller</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number"><?= esc($adoptionShelters) ?></div>
                    <div class="card-title">Adoption Shelters</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number"><?= esc($careServiceProviders) ?></div>
                    <div class="card-title">Care Service Providers</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number"><?= esc($medicalProviders) ?></div>
                    <div class="card-title">Medical Providers</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <!-- <div class="card card-danger">
                    <div class="card-number">25</div>
                    <div class="card-title">Banned Users</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div> -->
            </div>

            <!-- Search and Filter Section -->
            <div class="search-filter-container">
                <input type="text" class="search-bar" placeholder="Search users..."> <i class="fas fa-search"></i>
                <select class="filter-dropdown">
                    <option value="">Filter by User Type</option>
                    <option value="regular">Regular User</option>
                    <option value="seller">Seller</option>
                    <option value="adoption-shelter">Adoption Shelters</option>
                    <option value="care-provider">Care Service Providers</option>
                    <option value="medical-provider">Medical Providers</option>
                    <option value="banned-user">Banned Users</option>
                </select>
            </div>

            

            <div class="user-list">
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <div class="user-card">
                <div class="button-container">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= esc($user->id) ?>">
                        <?php if ($user->status === 'active'): ?>
                        <button class="ban-button1" name="status1" type="submit" value="block">Block</button>
                        <?php else: ?>
                        <button class="ban-button2" name="status1" type="submit" value="active">Active</button>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="user-details">
                    <p><strong>Name:</strong> <?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
                    <p><strong>User Type:</strong> <?= htmlspecialchars($user->role) ?></p>
                </div>
                
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</div>



        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>
<!-- <script>
    function markAsBanned(button) {
        // Change the button text to "Banned"
        if (button.textContent === "Ban") {
            button.textContent = "Banned";
            // Optional: Change the button's style to indicate it's banned
            button.style.backgroundColor = "#e53935";
            button.style.color = "#ffffff"; // White text
            button.style.cursor = "pointer";
            button.disabled = false;

        } else {
            button.textContent = "Ban";
            button.disabled = false;
        }
        // button.textContent = "Banned";

        // Disable the button to prevent further clicks

    }
</script> -->

</html>