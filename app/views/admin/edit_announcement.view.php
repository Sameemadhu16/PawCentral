<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Admin Dashboard - Edit Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/editAnnouncement.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <section class="announcement-form">
                <h1>Edit Announcement</h1>
                <form action="<?= ROOT ?>/admin/edit_announcement/submit" method="POST">
                    <input type="hidden" name="id" value="<?=htmlspecialchars($announcement->id)?>" >

                    <label for="title">title</label>
                    <input type="text" id="title" name="title" value="<?=htmlspecialchars($announcement->title) ?>" placeholder="Enter Title" required>

                    <label for="description">Description</label>
                    <textarea class="textarea_class" id="description" name="description" placeholder="Add Description" required><?=htmlspecialchars($announcement->content)?></textarea>

                    <button type="submit" class="done-button">
                        <i class="fas fa-check-circle"></i> Update
                    </button>
                </form>
            </section>
        </div>
    </div>

</body>

</html>