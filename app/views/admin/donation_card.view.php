<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Donation Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/donation_card.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/admin/donation.js" defer></script>
    
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">

        <div class="content">
            <div class="section-title">
                <h2>Donation Details</h2>
                <a href="<?= ROOT ?>/admin/donation" class="btn-secondary btn-action">
                    <i class="fas fa-arrow-left"></i> Back to Donations
                </a>
            </div>

            <div class="donation-details">
                <div class="donation-header">
                    <h3 class="donation-title">Max - Emergency Surgery</h3>
                    <span class="donation-status status-pending">Pending</span>
                </div>

                <div class="pet-details">
                    <div class="pet-image-large" style="background-image: url('<?= ROOT ?>/assets/images/pets/max.jpg');"></div>
                    <div class="pet-info">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Pet Name</div>
                                <div class="info-value">Max</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Pet Type</div>
                                <div class="info-value">Dog</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Requested Amount</div>
                                <div class="info-value">20,000 LKR</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Collected Amount</div>
                                <div class="info-value">0 LKR</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Created Date</div>
                                <div class="info-value">April 1, 2025</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Expected Completion</div>
                                <div class="info-value">May 1, 2025</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Category</div>
                                <div class="info-value">Medical</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Priority</div>
                                <div class="info-value">Urgent</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Description</div>
                            <div class="description-box">
                                <p>Max requires urgent surgery to treat a broken leg after being hit by a car. He's currently in stable condition but needs immediate medical attention.
                                    The surgery includes setting the bone, implanting pins to stabilize the fracture, and post-operative care. With your support, we can save his life
                                    and help him recover fully. All funds will go directly to the veterinary hospital for Max's treatment.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fund-progress">
                    <div class="progress-stats">
                        <div>Raised: <strong>0 LKR</strong></div>
                        <div>Goal: <strong>20,000 LKR</strong></div>
                        <div>Progress: <strong>0%</strong></div>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                </div>

                <div class="tabs">
                    <div class="tab active" data-tab="donors">Donors</div>
                    <div class="tab" data-tab="updates">Updates</div>
                    <div class="tab" data-tab="timeline">Timeline</div>
                </div>

                <div id="donors" class="tab-content">
                    <div class="no-data" style="text-align: center; padding: 30px 0;">
                        <i class="fas fa-user-friends" style="font-size: 32px; color: #ddd; margin-bottom: 15px;"></i>
                        <p>No donors yet for this request.</p>
                    </div>
                </div>

                <div id="updates" class="tab-content" style="display: none;">
                    <div class="no-data" style="text-align: center; padding: 30px 0;">
                        <i class="fas fa-newspaper" style="font-size: 32px; color: #ddd; margin-bottom: 15px;"></i>
                        <p>No updates posted for this request yet.</p>
                    </div>
                </div>

                <div id="timeline" class="tab-content" style="display: none;">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-title">Request Created</div>
                                <div class="timeline-date">April 1, 2025 - 09:34 AM</div>
                                <div class="timeline-description">The donation request for Max's emergency surgery was submitted.</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="timeline-title">Request Under Review</div>
                                <div class="timeline-date">April 1, 2025 - 10:15 AM</div>
                                <div class="timeline-description">The request is currently being reviewed by the admin team.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-action btn-primary" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=2'">
                        <i class="fas fa-check"></i> Approve Request
                    </button>
                    <button class="btn-action btn-danger" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=2'">
                        <i class="fas fa-times"></i> Reject Request
                    </button>
                    <button class="btn-action btn-secondary" onclick="window.location.href='<?= ROOT ?>/admin/donation/edit?id=2'">
                        <i class="fas fa-edit"></i> Edit Details
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>