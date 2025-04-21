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

            <div class="med-container">
                <h2>User Accounts Management</h2>

                <div class="filters-section">
                    <div class="search-filter">
                        <input type="text" id="searchInput" placeholder="Search by name, email..." class="search-input">
                    </div>

                    <div class="status-filters">
                        <button class="filter-btn active" data-status="all">All</button>
                        <button class="filter-btn" data-status="regular">Regular</button>
                        <button class="filter-btn" data-status="shelter">Shelter</button>
                        <button class="filter-btn" data-status="care_provider">Care Provider</button>
                        <button class="filter-btn" data-status="medical_provider">Medical Provider</button>
                    </div>
                </div>
                <!-- Overview Cards Section -->
                <div class="stats-overview">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-user"></i></div>
                        <div class="stat-content">
                            <div class="stat-value"><?= esc($regular) ?></div>
                            <div class="stat-label">Regular Users</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-store"></i></div>
                        <div class="stat-content">
                            <div class="stat-value"><?= esc($seller) ?></div>
                            <div class="stat-label">Sellers</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-home"></i></div>
                        <div class="stat-content">
                            <div class="stat-value"><?= esc($adoptionShelters) ?></div>
                            <div class="stat-label">Adoption Shelters</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-hand-holding-heart"></i></div>
                        <div class="stat-content">
                            <div class="stat-value"><?= esc($careServiceProviders) ?></div>
                            <div class="stat-label">Care Providers</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-stethoscope"></i></div>
                        <div class="stat-content">
                            <div class="stat-value"><?= esc($medicalProviders) ?></div>
                            <div class="stat-label">Medical Providers</div>
                        </div>
                    </div>
                </div>



                <div class="users-table-container">
                    <div class="users-table" id="userList">
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <div class="user-row" data-role="<?= htmlspecialchars($user->role) ?>">
                                    <div class="user-info">
                                        <div class="user-name"><?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></div>
                                        <div class="user-details">
                                            <span class="user-email"><i class="fas fa-envelope"></i> <?= htmlspecialchars($user->email) ?></span>
                                            <span class="user-type"><i class="fas fa-user-tag"></i> <?= htmlspecialchars($user->role) ?></span>
                                        </div>
                                    </div>
                                    <div class="user-actions">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= esc($user->id) ?>">
                                            <?php if ($user->status === 'active'): ?>
                                                <button class="status-active" name="status1" type="submit" value="block">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </button>
                                            <?php else: ?>
                                                <button class="status-blocked" name="status1" type="submit" value="active">
                                                    <i class="fas fa-ban"></i> Blocked
                                                </button>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="no-users">No users found in the system.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        

    </div>
    <?php include("../app/views/components/footer.php"); ?>

    <script>
        const filterBtns = document.querySelectorAll('.filter-btn');
        const userRows = document.querySelectorAll('.user-row');
        const searchInput = document.getElementById('searchInput');

        // Filter by role
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));

                // Add active class to clicked button
                this.classList.add('active');

                // Filter rows
                const selectedRole = this.getAttribute('data-status');
                let visibleCount = 0;

                userRows.forEach(row => {
                    const userRole = row.getAttribute('data-role');
                    if (selectedRole === 'all' || (selectedRole === 'regular' && userRole === 'user') || userRole === selectedRole) {
                        row.style.display = 'flex';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Show/hide no results message
                const noResults = document.querySelector('.no-users');
                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            });
        });

        // Search functionality
        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            // Get active filter
            const activeFilter = document.querySelector('.filter-btn.active')?.getAttribute('data-status') || 'all';

            userRows.forEach(row => {
                const userInfo = row.querySelector('.user-info').textContent.toLowerCase();
                const userRole = row.getAttribute('data-role');

                // Check if row matches search term and active filter
                const matchesSearch = userInfo.includes(searchText);
                const matchesFilter = activeFilter === 'all' || (activeFilter === 'regular' && userRole === 'user') || activeFilter === userRole;

                if (matchesSearch && matchesFilter) {
                    row.style.display = 'flex';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide no results message
            const noResults = document.querySelector('.no-users');
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });
    </script>
</body>

</html>