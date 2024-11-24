<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/addAnnouncement.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <!-- <?php include("../app/views/components/admin/adminSidebar.php"); ?> -->

        <div class="content">
            <section class="announcement-form">
                <div class="back-icon">
                    <a href="<?= ROOT ?>/admin/announcement">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>Add Announcement</h1>

                <!-- Display error if it exists -->
                <?php if (!empty($error)): ?>
                    <div class="error-message bounce-animation"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>


                <form  method="POST">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter Title" required>

                    <!-- <label for="date">Date</label>
                    <input type="date" id="date" name="date" required> -->

                    <label for="description">Description</label>
                    <textarea class="textarea_class" id="description" name="description" placeholder="Add Description" required></textarea>

                    <button type="submit" name="submitAnnouncement" class="done-button">Done</button>
                </form>
            </section>
        </div>
    </div>
</body>

</html>