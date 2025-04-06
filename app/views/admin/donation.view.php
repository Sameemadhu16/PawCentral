<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Donations</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/donation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/admin/donation.js" defer></script>
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <h2>Donations Management</h2>

            <!-- Statistics Cards -->
            <div class="donation-overview">
                <div class="stat-card">
                    <h3>Total Donations</h3>
                    <div class="value">143,500 LKR</div>
                </div>
                <div class="stat-card">
                    <h3>Pending Requests</h3>
                    <div class="value">8</div>
                </div>
                <div class="stat-card">
                    <h3>Approved Requests</h3>
                    <div class="value">23</div>
                </div>
                <div class="stat-card">
                    <h3>This Month</h3>
                    <div class="value">45,200 LKR</div>
                </div>
            </div>

            <!-- Pending Requests Section -->
            <div class="section-title">
                <h2>Pending Requests</h2>
                <a href="<?= ROOT ?>/admin/donation/all" class="view-all">View All</a>
            </div>

            <div class="pending-requests">
                <!-- Pending Request Card -->
                <div class="request-card">
                    <span class="badge">Urgent</span>
                    <div class="pet-image" style="background-image: url('<?= ROOT ?>/assets/images/pets/max.jpg');"></div>
                    <div class="card-content">
                        <h3>Max - Emergency Surgery</h3>
                        <div class="info">
                            <span>Requested: <strong>20,000 LKR</strong></span>
                            <span>Collected: <strong>0 LKR</strong></span>
                        </div>
                        <p class="description">Max requires urgent surgery to treat a broken leg. With your support, we can save his life.</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="card-actions">
                            <button class="btn approve" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=2'">Approve</button>
                            <button class="btn reject" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=2'">Reject</button>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="pet-image" style="background-image: url('<?= ROOT ?>/assets/images/pets/buddy.jpg');"></div>
                    <div class="card-content">
                        <h3>Buddy - Food Supplies</h3>
                        <div class="info">
                            <span>Requested: <strong>5,000 LKR</strong></span>
                            <span>Collected: <strong>0 LKR</strong></span>
                        </div>
                        <p class="description">Buddy is a senior dog who needs daily special dietary food. Your donation will help.</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="card-actions">
                            <button class="btn approve" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=3'">Approve</button>
                            <button class="btn reject" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=3'">Reject</button>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="pet-image" style="background-image: url('<?= ROOT ?>/assets/images/pets/luna.jpg');"></div>
                    <div class="card-content">
                        <h3>Luna - Vaccination</h3>
                        <div class="info">
                            <span>Requested: <strong>8,000 LKR</strong></span>
                            <span>Collected: <strong>0 LKR</strong></span>
                        </div>
                        <p class="description">Luna is a stray cat that needs vaccinations to protect her from diseases.</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="card-actions">
                            <button class="btn approve" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=4'">Approve</button>
                            <button class="btn reject" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=4'">Reject</button>
                        </div>
                    </div>
                </div>

                <div class="request-card">
                    <div class="pet-image" style="background-image: url('<?= ROOT ?>/assets/images/pets/rocky.jpg');"></div>
                    <div class="card-content">
                        <h3>Rocky - Shelter Renovation</h3>
                        <div class="info">
                            <span>Requested: <strong>15,000 LKR</strong></span>
                            <span>Collected: <strong>0 LKR</strong></span>
                        </div>
                        <p class="description">Rocky and other animals are living in an old shelter that needs repairs.</p>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="card-actions">
                            <button class="btn approve" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=5'">Approve</button>
                            <button class="btn reject" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=5'">Reject</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-container">
                <div class="chart-card">
                    <h3>Donation Trends</h3>
                    <canvas id="donationTrendChart"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Request Categories</h3>
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <!-- All Donations List -->
            <div class="section-title" style="margin-top: 30px;">
                <h2>All Donation Requests</h2>
                <div>
                    <select id="statusFilter">
                        <option value="all">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <div class="donation-list">
                <table class="donation-table">
                    <thead>
                        <tr>
                            <th>Pet Name</th>
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Collected</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Max</td>
                            <td>Emergency Surgery</td>
                            <td>20,000 LKR</td>
                            <td>0 LKR</td>
                            <td><span class="tag pending">Pending</span></td>
                            <td>2025-04-01</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn approve-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Buddy</td>
                            <td>Food Supplies</td>
                            <td>5,000 LKR</td>
                            <td>0 LKR</td>
                            <td><span class="tag pending">Pending</span></td>
                            <td>2025-04-02</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn approve-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Luna</td>
                            <td>Vaccination</td>
                            <td>8,000 LKR</td>
                            <td>0 LKR</td>
                            <td><span class="tag pending">Pending</span></td>
                            <td>2025-04-03</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn approve-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Rocky</td>
                            <td>Shelter Renovation</td>
                            <td>15,000 LKR</td>
                            <td>0 LKR</td>
                            <td><span class="tag pending">Pending</span></td>
                            <td>2025-04-03</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn approve-btn">Approve</button>
                                    <button class="action-btn reject-btn">Reject</button>
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Charlie</td>
                            <td>Adoption Preparation</td>
                            <td>6,000 LKR</td>
                            <td>6,000 LKR</td>
                            <td><span class="tag approved">Approved</span></td>
                            <td>2025-03-25</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Daisy</td>
                            <td>Spaying</td>
                            <td>7,000 LKR</td>
                            <td>0 LKR</td>
                            <td><span class="tag rejected">Rejected</span></td>
                            <td>2025-03-20</td>
                            <td>
                                <div class="action-btns">
                                    <button class="action-btn view-btn">View</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>