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
            <div class="cards-container">
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

            <div class="search-filter-container" id="filter_dropdown">
                <input type="text" class="search-bar" placeholder="Search users..." id="searchInput">
                <button>
                    <i class="fas fa-search"></i>
                </button>

                <select name="role" class="filter-dropdown" id="roleFilter">
                    <option value="">Filter by User Type</option>
                    <option value="user">Regular User</option>
                    <option value="seller">Seller</option>
                    <option value="shelter">Adoption Shelters</option>
                    <option value="service_prov">Care Service Providers</option>
                    <option value="medical_provider">Medical Providers</option>
                    <!-- <option value="banned-user">Banned Users</option> -->
                </select>
            </div>
            <div id="userList">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <div class="user-card" data-role="<?= htmlspecialchars($user->role) ?>">
                            <div class="button-container">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= esc($user->id) ?>">
                                    <?php if ($user->status === 'active'): ?>
                                        <button class="ban-button2" name="status1" type="submit" value="block">Active</button>
                                    <?php else: ?>
                                        <button class="ban-button1" name="status1" type="submit" value="active">Block</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                            <div class="user-details">
                                <p><strong>Name:</strong> <?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
                                <p><strong>User Type:</strong> <?= htmlspecialchars($user->role) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>




        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>
<script>
    const roleFilter = document.getElementById('roleFilter');
    const userCards = document.querySelectorAll('.user-card');

    // Listen for changes on the dropdown
    roleFilter.addEventListener('change', function() {
        const selectedRole = roleFilter.value; // Get selected value

        userCards.forEach(card => {
            const userRole = card.getAttribute('data-role'); // Get role from user card

            // Show/Hide cards based on filter
            if (selectedRole === '' || userRole === selectedRole) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

</html>