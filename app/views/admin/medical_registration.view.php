<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - Medical Registrations</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/medicalRegistration.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/admin/medicalRegistration.js" defer></script>
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <div>
            <?php include("../app/views/components/admin/adminSidebar.php"); ?>
        </div>

        <div class="med-container">
            <h2>Medical Registrations</h2>

            <div class="filters-section">
                <div class="search-filter">
                    <input type="text" id="searchInput" placeholder="Search by service name..." class="search-input">
                </div>

                <div class="status-filters">
                    <button class="filter-btn active" data-status="all">All</button>
                    <button class="filter-btn" data-status="pending">Pending</button>
                    <button class="filter-btn" data-status="approved">Approved</button>
                    <button class="filter-btn" data-status="rejected">Rejected</button>
                </div>
            </div>

            <div class="registration-stats">
                <div class="stat-card">
                    <span class="stat-label">Total</span>
                    <span class="stat-value" id="totalCount">0</span>
                </div>
                <div class="stat-card pending-card">
                    <span class="stat-label">Pending</span>
                    <span class="stat-value" id="pendingCount">0</span>
                </div>
                <div class="stat-card approved-card">
                    <span class="stat-label">Approved</span>
                    <span class="stat-value" id="approvedCount">0</span>
                </div>
                <div class="stat-card rejected-card">
                    <span class="stat-label">Rejected</span>
                    <span class="stat-value" id="rejectedCount">0</span>
                </div>
            </div>

            <div class="content">
                <table class="medical-registration-table">
                    <thead class="mr_table_t">
                        <tr>
                            <th>
                                <h5>Service Name</h5>
                            </th>
                            <th>
                                <h5>Veterinarian's CV</h5>
                            </th>
                            <th>
                                <h5>Status</h5>
                            </th>
                            <th>
                                <h5>Actions</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="registrationTableBody">
                        <?php foreach ($data as $provider): ?>
                            <tr class="mr_row" data-status="<?= esc($provider->verifiedStatus) ?>">
                                <td><?php echo esc($provider->name); ?></td>
                                <td><a href="<?= ROOT ?>/<?= esc($provider->license_proof) ?>" class="view-btn" target="_blank">View Proof</a></td>
                                <td>
                                    <?php if ($provider->verifiedStatus == 'pending'): ?>
                                        <span class="status-badge pending">Pending</span>
                                    <?php elseif ($provider->verifiedStatus == 'approved'): ?>
                                        <span class="status-badge approved">Approved</span>
                                    <?php elseif ($provider->verifiedStatus == 'rejected'): ?>
                                        <span class="status-badge rejected">Rejected</span>
                                    <?php endif ?>
                                </td>
                                <td class="action-buttons">
                                    <form method="POST" class="action-form">
                                        <input type="hidden" name="med_id" value="<?php echo esc($provider->med_id); ?>">
                                        <button class="action-btn approve" type="submit" name="approve" value="approved" <?= $provider->verifiedStatus == 'approved' ? 'disabled' : '' ?>>
                                             Approve
                                        </button>
                                        <button class="action-btn reject" type="submit" name="reject" <?= $provider->verifiedStatus == 'rejected' ? 'disabled' : '' ?>>
                                             Reject
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <div id="noResults" class="no-results hidden">
                    <i class="fas fa-search"></i>
                    <p>No registrations match your search criteria</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Notification -->
    <div id="popupNotification" class="popup">
        <div class="popup-content">
            <i id="popupIcon" class="fas"></i>
            <span id="popupMessage"></span>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>