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
    <script>
        const ROOT = "<?= ROOT ?>";
    </script>
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php");
    // show($data);
    ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <h2>Donations Management</h2>

            <!-- Statistics Cards -->
            <?php
            // Ensure 'total_donations' exists and is numeric, else default to 0
            $totalDonations = $data['total_donations'];
            $pendingCount = $data['pending_count'];
            $approveCount = $data['approved_count'];
            ?>

            <div class="donation-overview">
                <div class="stat-card">
                    <h3>Total Donations</h3>
                    <div class="value"><?php echo number_format((float)$totalDonations, 2); ?> LKR</div>
                </div>
                <div class="stat-card">
                    <h3>Pending Requests</h3>
                    <div class="value"><?php echo number_format((int)$pendingCount) ?></div>
                </div>
                <div class="stat-card">
                    <h3>Approved Requests</h3>
                    <div class="value"><?php echo number_format((int)$approveCount) ?></div>
                </div>
                <div class="stat-card">
                    <h3>This Month</h3>
                    <div class="value">45,200 LKR</div>
                </div>
            </div>

            <!-- Pending Requests Section -->
            <div class="section-title">
                <h2>Pending Requests</h2>
            </div>

            <div class="pending-requests">
                <?php foreach ($data['pending_donations'] as $request): ?>
                    <div class="request-card">
                        <div class="pet-image" style="background-image: url('<?= ROOT ?>/assets/images/pets/<?= $request->image ?>');"></div>
                        <div class="card-content">
                            <h3><?= $request->title ?></h3>
                            <div class="info">
                                <span>Requested: <strong><?= number_format($request->amount, 2) ?> LKR</strong></span>
                                <span>Collected: <strong><?= number_format($request->collected, 2) ?> LKR</strong></span>
                            </div>
                            <p class="description"><?= $request->info ?></p>
                            <div class="progress-container">
                                <?php
                                $progress = ($request->amount > 0) ? ($request->collected / $request->amount) * 100 : 0;
                                ?>
                                <div class="progress-bar" style="width: <?= $progress ?>%"></div>
                            </div>
                            <div class="card-actions">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $request->id ?>">
                                    <button type="submit" name="approve" class="action-btn approve-btn">Approve</button>
                                </form>
                                <!-- Reject Button -->
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $request->id ?>">
                                    <button type="submit" name="reject" class="action-btn reject-btn">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                            <th>Title</th>
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Collected</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['all_requests'] as $allRequests): ?>
                            <tr>
                                <td><?= esc($allRequests->title); ?></td>
                                <td><?= esc($allRequests->reason); ?></td>
                                <td><?= esc($allRequests->amount); ?></td>
                                <td><?= esc($allRequests->collected); ?></td>
                                <td>
                                    <span class="tag
                                        <?php
                                        if ($allRequests->status == 0) echo 'pending';
                                        elseif ($allRequests->status == 1) echo 'approved';
                                        else echo 'rejected';
                                        ?>">
                                        <?php
                                        if ($allRequests->status == 0) echo 'Pending';
                                        elseif ($allRequests->status == 1) echo 'Approved';
                                        else echo 'Rejected';
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <?php if ($allRequests->status == 0): ?>
                                            <!-- Approve Button -->
                                            <form method="POST">
                                                <input type="hidden" name="id" value="<?= $allRequests->id ?>">
                                                <button type="submit" name="approve" class="action-btn approve-btn">Approve</button>
                                            </form>
                                            <!-- Reject Button -->
                                            <form method="POST">
                                                <input type="hidden" name="id" value="<?= $allRequests->id ?>">
                                                <button type="submit" name="reject" class="action-btn reject-btn">Reject</button>
                                            </form>
                                            <button class="action-btn view-btn" onclick="window.location.href='<?= ROOT ?>/admin/donation/view?id=<?= $allRequests->id ?>'">View</button>
                                        <?php else: ?>
                                            <!-- View Button -->
                                            <button class="action-btn view-btn" onclick="window.location.href='<?= ROOT ?>/admin/donation/view?id=<?= $allRequests->id ?>'">View</button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>