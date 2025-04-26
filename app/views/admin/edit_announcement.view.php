<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/editAnnouncement.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="content">
            <div class="announcement-form">
                <div class="page-header">
                    <div class="back-icon">
                        <a href="<?= ROOT ?>/admin/view_announcement?id=<?= htmlspecialchars($announcement->id) ?>" title="Back to View">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back</span>
                        </a>

                    </div>
                </div>
                <!-- <h1>Edit Announcement</h1> -->

                <!-- Display error if it exists -->
                <?php if (!empty($error)): ?>
                    <div class="error-message bounce-animation"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>


                <form method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($announcement->id) ?>">

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($announcement->title) ?>" required>

                    <!-- <label for="date">Date</label>
                    <input type="date" id="date" name="date" required> -->

                    <label for="description">Description</label>
                    <textarea class="textarea_class" id="description" name="description" placeholder="Edit Description" required><?= htmlspecialchars($announcement->content) ?></textarea>

                    <button type="submit" name="submitAnnouncement" class="done-button">Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>