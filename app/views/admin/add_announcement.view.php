<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcement</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/addAnnouncement.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="content">
            <section class="announcement-form">
                <div class="page-header">
                    <div class="back-icon">
                        <a href="<?= ROOT ?>/admin/announcement" title="Back to Announcements">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <h1>Add Announcement</h1>
                </div>

                <!-- Display error if it exists -->
                <?php if (!empty($error)): ?>
                    <div class="error-message bounce-animation">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter announcement title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="textarea_class" id="description" name="description" placeholder="Add detailed announcement description" required></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submitAnnouncement" class="done-button">
                            <i class="fas fa-check"></i> Submit 
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>

    <script>
        // Auto-hide error messages after 10 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(message => {
                setTimeout(() => {
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 1000);
                }, 10000);
            });
        });
    </script>
</body>

</html>