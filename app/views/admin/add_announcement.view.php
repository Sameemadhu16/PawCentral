<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Admin Dashboard - Add Announcements</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/addAnnouncement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <section class="announcement-form">
                <h1>Add Announcement</h1>
                <form>
                    <label for="title">Title</label>
                    <input type="text" id="title" placeholder="Enter Title" required>

                    <label for="date">Date</label>
                    <input type="date" id="date" required>

                    <label for="description">Description</label>
                    <textarea class="textarea_class" id="description" placeholder="Add Description" required></textarea>



                    <button type="submit" class="done-button">
                        <i class="fas fa-check-circle"></i> Done
                    </button>
                </form>
            </section>
        </div>
    </div>

</body>

</html>