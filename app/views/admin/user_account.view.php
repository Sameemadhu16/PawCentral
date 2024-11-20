<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - User Accounts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/userAccounts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="user-accounts-section">
            <h2>User Accounts</h2>
            
            <!-- Overview Cards Section -->
            <div class="cards-container">
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Regular User</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Seller</div>
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
                <!-- <div class="card card-danger">
                    <div class="card-number">25</div>
                    <div class="card-title">Banned Users</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div> -->
            </div>

            <!-- Search and Filter Section -->
            <div class="search-filter-container">
                <input type="text" class="search-bar" placeholder="Search users..." > <i class="fas fa-search" ></i>
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

            <!-- User List -->
            <div class="user-list">
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>
                <div class="user-card">
                    <p><strong>Name:</strong> Sameera Madhuranga</p>
                    <p><strong>Email:</strong> sameera@gmail.com</p>
                    <p><strong>User Type:</strong> Regular User</p>
                </div>

                <!-- Repeat user cards as needed with dummy data -->
            </div>
        </div>
    </div>
</body>
</html>
