<!-- view_announcement.view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/viewAnnouncement.css">
</head>
<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="announcement-details">
        <h2>Announcement Title</h2>
        <h5>Date: YYYY-MM-DD</h5>
        <p>This is a detailed description of the announcement. It contains all the important information related to the announcement.</p>

        <div class="actions">
            <a href="#" class="edit-button">Edit</a>
            <button class="delete-button" onclick="openDeleteModal()">Delete</button>
        </div>
    </div>

    <!-- Delete confirmation modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this announcement?</p>
            <button onclick="confirmDelete()">Yes</button>
            <button onclick="closeDeleteModal()">No</button>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function confirmDelete() {
            alert("Delete action confirmed.");
        }
    </script>
</body>
</html>
