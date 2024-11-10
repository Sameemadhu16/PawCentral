<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Announcements</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/announcement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="container">
                <h2>Announcements</h2>
                <button class="add-announcement" onclick="window.location.href='<?= ROOT ?>/admin/add_announcement'">Add Announcement</button>
            </div>

            <section class="announcement-section">
                <!-- Check if announcements are available -->
                <?php if (!empty($announcements)): ?>
                    <?php foreach ($announcements as $announcement): ?>
                        <div class="announcement-card">
                            <div class="announcement-info">
                                <h3><?= htmlspecialchars($announcement->title) ?></h3>
                                <h5>Date: <?= htmlspecialchars(date("Y-m-d", strtotime($announcement->updated_at))) ?></h5>
                                <p><?= htmlspecialchars($announcement->content) ?></p>
                            </div>
                            <!-- <div class="card-actions">
                                <a href="<?= ROOT ?>/admin/edit_announcement?id=<?= $announcement->id ?>">
                                    <i class="fas fa-edit edit-icon"></i>
                                </a>
                                <i class="fas fa-trash delete-icon" onclick="openModal(<?= $announcement->id ?>)"></i>
                            </div> -->
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No announcements found.</p>
                <?php endif; ?>
            </section>

            <!-- Delete Confirmation Modal -->
            <!-- <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <p>Are you sure you want to delete this announcement?</p>
                    <div class="modal-actions">
                        <button onclick="deleteItem()">Yes</button>
                        <button onclick="closeModal()">No</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>