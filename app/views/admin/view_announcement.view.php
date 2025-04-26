<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/viewAnnouncement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/admin/deleteAnnouncementModel.js" defer></script>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="content">
            <div class="announcement-details">
                <div class="page-header">
                    <div class="back-icon">
                        <a href="<?= ROOT ?>/admin/announcement" title="Back to Announcements">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="announcement-meta">
                        <span class="announcement-date">
                            <i class="far fa-calendar-alt"></i>
                            <?= htmlspecialchars(date("F d, Y", strtotime($announcement->updated_at))) ?>
                        </span>
                    </div>
                </div>

                <div class="announcement-content">
                    <h2><?= htmlspecialchars($announcement->title) ?></h2>
                    <div class="content-divider"></div>
                    <div class="announcement-body">
                        <p><?= htmlspecialchars($announcement->content) ?></p>
                    </div>
                </div>

                <div class="actions">
                    <a href="<?= ROOT ?>/admin/edit_announcement?id=<?= $announcement->id ?>" class="edit-button">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="delete-button" onclick="openDeleteModal(<?= $announcement->id ?>)">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete confirmation modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
            </div>
            <div class="modal-body">
                <i class="fas fa-exclamation-triangle warning-icon"></i>
                <p>Are you sure you want to delete this announcement?</p>
                <p class="modal-subtitle">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <button type="button" onclick="closeDeleteModal()" class="cancel-button">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="confirm-button" name="deleteAnnouncement">
                        <i class="fas fa-check"></i> Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>