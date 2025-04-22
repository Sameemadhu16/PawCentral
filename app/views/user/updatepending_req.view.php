<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>

        <div class="user-accounts-section">

            <div class="form-container">
            <span class="close-btn" onclick="window.location.href='<?=ROOT?>/userprofile/donations'">&times;</span>
            <h2>Edit Donation info</h2>
            <form id="petForm" action="<?= ROOT ?>/userprofile/donations/updatereq" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=esc($post->id)?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?=esc($post->title)?>" required>
            
            <label for="need">Need for Donation:</label>
            <select id="need_category" name="need_category" required>
                <option value="Other" <?= $post->need_category == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Bills" <?= $post->need_category == 'Bills' ? 'selected' : '' ?>>Medical Bills</option>
                <option value="CareSupport" <?= $post->need_category == 'CareSupport' ? 'selected' : '' ?>>Care Support</option>
                <option value="Food" <?= $post->need_category == 'Food' ? 'selected' : '' ?>>Food</option>
                <option value="Medicine" <?= $post->need_category == 'Medicine' ? 'selected' : '' ?>>Medicine</option>
                <option value="Supplies" <?= $post->need_category == 'Supplies' ? 'selected' : '' ?>>Supplies</option>
            </select>

            <label for="reason">Brief intro for the Request:</label>
            <textarea id="reason" name="reason" rows="4" maxlength="100" required><?=esc($post->reason)?></textarea>

            <label for="info">Explain the reason for the Donation Request:</label>
            <textarea id="info" name="info" rows="7" required><?=esc($post->info)?></textarea>

            <label for="donimg">Upload a Photo:</label>
            <input type="file" id="donimg" name="newimg" accept="image/*">

            <input type="hidden" name="old_img" value="<?= $post->img ? $post->img : ''; ?>" />
            
            <div id="imagePreviewContainer">
                <?php if (!empty($post->img)): ?>
                <img src="<?=esc($post->img)?>" alt="Current Image">
                <?php endif; ?>
            </div>
            <script>
              document.getElementById('donimg').addEventListener('change', function () {
                const maxFiles = 1;
                const fileInput = this;
                
                if (fileInput.files.length > maxFiles) {
                  feedback.style.display = 'block';
                  fileInput.value = ''; // Clear the input
                } else {
                  feedback.style.display = 'none';
                }
              });

              document.getElementById('donimg').addEventListener('change', function () {
                const previewContainer = document.getElementById('imagePreviewContainer');
                previewContainer.innerHTML = ''; // Clear existing previews

                Array.from(this.files).forEach(file => {
                  if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    // img.style.width = '100px';
                    // img.style.margin = '5px';
                    previewContainer.appendChild(img);
                  }
                });
              });
          </script>

            <label for="amount">Required Amount:</label>
            <input type="number" id="amount" name="amount" min="<?=esc($post->collected)?>" max="100000" step="any" value="<?=esc($post->amount)?>" required>

            <label for="before_date">Before when do you need the support:</label>
            <input type="date" id="before_date" name="before_date" value="<?=esc($post->expire_date)?>" required>
            
            <script>
                document.querySelector('form').addEventListener('submit', function (event) {
                const amount = document.getElementById('amount').value;

                // Validate expire date of the req
                const before_date = new Date(document.getElementById('before_date').value);
                const today = new Date();
                if (before_date < today) {
                    alert('Request deadline date cannot be in the past.');
                    event.preventDefault(); // Prevent form submission
                }

                // Validate amount
                if (amount < 0 || amount > 100000) {
                    alert('Amount must be between 0 and 100,000 Rs.');
                    event.preventDefault(); // Prevent form submission
                    return;
                }
                });
            </script>

            <!-- Agreement -->
            <label>
                <input type="checkbox" id="agreeTerms" required><small>
                I agree to the terms and conditions for receiving and requesting for donations.</small>
            </label>
            <label for="ack">
            <input type="checkbox" id="agreeTerms" required>
              <small>
              Let admins re-review the donation request.
              </small>
            </label>

            <button type="submit">Update</button>
            </form>
        </div>
    </div>
    </div>

    
<?php include("../app/views/components/footer.php"); ?>
<script src="<?= ROOT ?>/assets/js/popupform.js"></script>

</body>

</html>