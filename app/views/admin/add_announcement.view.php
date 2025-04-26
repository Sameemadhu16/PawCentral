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

                <form method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter announcement title" required>
                        <small class="error-message" id="title-error" style="display: none; color: red;"></small>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="textarea_class" id="description" name="description" placeholder="Add detailed announcement description" required></textarea>
                        <small class="error-message" id="description-error" style="display: none; color: red;"></small>
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
        function validateForm() {
            let isValid = true;

            // Clear previous error messages
            const titleError = document.getElementById('title-error');
            const descriptionError = document.getElementById('description-error');
            titleError.style.display = 'none';
            descriptionError.style.display = 'none';

            // Validate title
            const title = document.getElementById('title').value.trim();
            if (title.length < 5 || title.length > 100) {
                titleError.textContent = 'Title must be between 5 and 100 characters.';
                titleError.style.display = 'block';
                isValid = false;
            }

            // Validate description
            const description = document.getElementById('description').value.trim();
            if (description.length < 10 || description.length > 1000) {
                descriptionError.textContent = 'Description must be between 10 and 1000 characters.';
                descriptionError.style.display = 'block';
                isValid = false;
            }

            // Automatically hide error messages after 5 seconds
            if (!isValid) {
                setTimeout(() => {
                    titleError.style.display = 'none';
                    descriptionError.style.display = 'none';
                }, 5000);
            }

            return isValid;
        }
    </script>
</body>

</html>