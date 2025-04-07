<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Announcements</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/announcement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="title-container">
                <h2>Announcements</h2>
                <button class="add-announcement" onclick="window.location.href='<?= ROOT ?>/admin/add_announcement'">
                    <i class="fas fa-plus-circle"></i> Add Announcement
                </button>
            </div>

            <section class="announcement-section">
                <!-- Check if announcements are available -->
                <?php if (!empty($announcements)): ?>
                    <?php foreach ($announcements as $announcement): ?>
                        <div class="announcement-card" onclick="window.location.href='<?= ROOT ?>/admin/view_announcement?id=<?= $announcement->id ?>'">
                            <div class="announcement-info">
                                <h3><?= esc($announcement->title) ?></h3>
                                <div class="meta-info">
                                    <span class="date-badge"><i class="far fa-calendar-alt"></i> <?= esc(date("F d, Y", strtotime($announcement->updated_at))) ?></span>
                                </div>
                                <p class="description"><?= esc($announcement->content) ?></p>
                            </div>
                            <!-- <div class="card-actions">
                                <a href="<?= ROOT ?>/admin/edit_announcement?id=<?= $announcement->id ?>" onclick="event.stopPropagation()">
                                    <i class="fas fa-edit edit-icon" title="Edit"></i>
                                </a>
                                <i class="fas fa-trash delete-icon" onclick="openModal(<?= $announcement->id ?>); event.stopPropagation();" title="Delete"></i>
                            </div> -->
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-announcements">
                        <i class="fas fa-bullhorn fa-3x"></i>
                        <p>No announcements found.</p>
                        <p>Click the "Add Announcement" button to create your first announcement!</p>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Delete Confirmation Modal -->
            <!-- <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <h3>Confirm Delete</h3>
                    <p>Are you sure you want to delete this announcement?</p>
                    <div class="modal-actions">
                        <button id="cancelDelete" class="btn-secondary">Cancel</button>
                        <button id="confirmDelete" class="btn-danger">Delete</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>

</body>

</html>