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
        <div class="back-icon">
            <a href="<?= ROOT ?>/admin/announcement">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <h2>Announcement Title</h2>
        <h5>Date: YYYY-MM-DD</h5>
        <p>This is a detailed description of the announcement. It contains all the important information related to the announcement.</p>

        <div class="actions">
            <button class="edit-button">Update</button>
            <button class="delete-button" onclick="openDeleteModal()">Delete</button>
        </div>
    </div>

    <!-- Delete confirmation modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this announcement?</p>
            <button class="confirm-button" onclick="confirmDelete()">Yes</button>
            <button class="cancel-button" onclick="closeDeleteModal()">No</button>
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