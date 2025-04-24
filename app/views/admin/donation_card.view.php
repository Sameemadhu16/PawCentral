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
    <?php include("../app/views/components/header.php"); 
    // show($data['donation']->img)
    ?>

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
                    <h3 class="donation-title"><?= esc($data['donation']->title) ?></h3>
                    <span class="donation-status
                        <?= $data['donation']->status == 0 && $data['donation']->approved == 0 ? 'status-pending' : ($data['donation']->status == 0 && $data['donation']->approved == 1 ? 'status-approved' : 'status-rejected') ?>">
                        <?= $data['donation']->status == 0 && $data['donation']->approved == 0 ? 'Pending' : ($data['donation']->status == 0 && $data['donation']->approved == 1 ? 'Approved' : 'Rejected') ?>
                    </span>
                </div>

                <div class="pet-details">
                    <div class="pet-image-large" style="background-image: url('<?= esc($data['donation']->img) ?>');"></div>
                    <div class="pet-info">
                        <div class="info-grid">


                            <div class="info-item">
                                <div class="info-label">Requested Amount</div>
                                <div class="info-value"><?= number_format($data['donation']->amount, 2) ?> LKR</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Collected Amount</div>
                                <div class="info-value"><?= number_format($data['donation']->collected, 2) ?> LKR</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Requested Date</div>
                                <div class="info-value"><?= date('F j, Y', strtotime($data['donation']->requested_at)) ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Expired Date</div>
                                <div class="info-value"><?= date('F j, Y', strtotime($data['donation']->expire_date)) ?></div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Category</div>
                                <div class="info-value">sameera</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Description</div>
                            <div class="description-box">
                                <p><?= esc($data['donation']->info) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fund-progress">
                    <div class="progress-stats">
                        <div>Raised: <strong><?= number_format($data['donation']->collected, 2) ?> LKR</strong></div>
                        <div>Goal: <strong><?= number_format($data['donation']->amount, 2) ?> LKR</strong></div>
                        <div>Progress: <strong><?= $data['donation']->amount > 0 ? round(($data['donation']->collected / $data['donation']->amount) * 100) : 0 ?>%</strong></div>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-fill" style="width: <?= $data['donation']->amount > 0 ? ($data['donation']->collected / $data['donation']->amount) * 100 : 0 ?>%"></div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $donation->id ?>">
                    <button class="btn-action btn-primary" type="submit" name="approve">
                        <i class="fas fa-check"></i> Approve Request
                    </button>
                </form>
                
                    <button class="btn-action btn-danger" onclick="openRejectModal(<?= $donation->id ?>)">
                        <i class="fas fa-times"></i> Reject Request
                    </button>

               


            </div>
        </div>
    </div>
    <!-- Reject Reason Modal -->
    <div id="rejectModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeRejectModal()">&times;</span>
            <h3>Reject Request</h3>
            <form method="POST">
                <input type="hidden" name="id" id="rejectRequestId">
                <label for="reason">Reason for Rejection:</label>
                <textarea name="reason" id="reason" rows="4" required></textarea>
                <button type="submit" name="reject" class="action-btn reject-btn">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function openRejectModal(requestId) {
            document.getElementById('rejectRequestId').value = requestId;
            document.getElementById('rejectModal').style.display = 'block';
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').style.display = 'none';
        }
    </script>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>