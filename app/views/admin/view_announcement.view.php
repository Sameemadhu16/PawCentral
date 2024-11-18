<!-- view_announcement.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/viewAnnouncement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/admin/deleteAnnouncementModel.js" defer></script>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="announcement-details">
        <h2><?= htmlspecialchars($announcement->title) ?></h2>
        <h5>Date: <?= htmlspecialchars(date("Y-m-d", strtotime($announcement->updated_at))) ?></h5>
        <p><?= htmlspecialchars($announcement->content) ?></p>

        <div class="actions">
            <a href="<?= ROOT ?>/admin/edit_announcement?id=<?= $announcement->id ?>" class="edit-button">Edit</a>
            <button class="delete-button" onclick="openDeleteModal(<?= $announcement->id ?>)">Delete</button>
        </div>
    </div>

    <!-- Delete confirmation modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this announcement?</p>
            <button onclick="confirmDelete(<?= $announcement->id ?>)">Yes</button>
            <button onclick="closeDeleteModal()">No</button>
        </div>
    </div>

    <!-- <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function confirmDelete() {
            alert("Delete action confirmed.");
            closeDeleteModal();
        }
    </script> -->


</body>

</html>