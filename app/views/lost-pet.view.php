<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Pets</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/lost-pet.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>

    <div class="lost-pet-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <h1><a href="<?=ROOT?>/lostandfound">Lost & Found pets</a> / <?= htmlspecialchars($pet->status) ?> <?= htmlspecialchars($pet->type) ?> </h1>
        </div>

        <!-- Post Title -->
        <div class="post-title">
            <span id="pet-name"><?= htmlspecialchars($pet->petName ?? 'Unknown') ?></span> 
            <span id="pet-breed"><?= htmlspecialchars($pet->breed !='Other' ? " - ".$pet->breed : '') ?></span>
        </div>

        <!-- Post Info -->
        <div class="post-info">
            <p id="posted-on">Posted on <?= htmlspecialchars($pet->publishedOn ?? 'Unknown Date') ?></p>
            <p id="location"><?= htmlspecialchars($pet->location ?? 'Unknown Location') ?></p>
        </div>

        <!-- Pet Image and Slider -->
        <div class="pet-image-container">
            <button class="slider-arrow left" onclick="prevImage()">&#8249;</button>
            <img id="pet-image" class="pet-image" src="<?= htmlspecialchars($pet->img1 ?? 'default.jpg') ?>" alt="Lost Pet Image">
            <button class="slider-arrow right" onclick="nextImage()">&#8250;</button>
        </div>

        <!-- Specifications -->
        <div class="specs"><p>Found by :</p><span><?= htmlspecialchars($pet->found_by ?? 'Unknown') ?></span></div>
        <div class="specs"><p>Location :</p><span><?= htmlspecialchars($pet->location ?? 'Unknown') ?></span></div>
        <div class="specs"><p>Height :</p><span><?= htmlspecialchars($pet->height ?? 'Unknown') ?> ft</span></div>
        <div class="specs"><p>Sex :</p><span><?= htmlspecialchars($pet->sex ?? 'Unknown') ?></span></div>
        <div class="specs"><p>Age :</p><span><?= htmlspecialchars($pet->age ?? 'Unknown') ?> months</span></div>
        <div class="specs"><p>Health Condition :</p><span><?= htmlspecialchars($pet->health ?? 'Unknown') ?></span></div>
        <div class="specs"><p>Color :</p><span><?= htmlspecialchars($pet->color ?? 'Unknown') ?></span></div>

        <!-- Contact Info -->
        <div class="contact-section">
            <img class="contact-icon" src="<?=ROOT?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
            <span>Contact : </span>
            <div class="contact-info">
                <span id="phone" class="reveal-info" data-info="<?= htmlspecialchars($pet->contactNo ?? 'N/A') ?>">Click to show</span>
            </div>
        </div>

        <!-- Description -->
        <div class="description-section">
            <h3>Description</h3>
            <p id="pet-description">
                <?= nl2br(htmlspecialchars($pet->description ?? 'No description added')) ?>
            </p>
        </div>
    </div>
     <!-- PHP Code to Prepare Base64 Images -->
    <?php
    // Prepare the base64 images in PHP
    $images = [];
    if (!empty($pet->img1)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($pet->img1);
    }
    if (!empty($pet->img2)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($pet->img2);
    }
    if (!empty($pet->img3)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($pet->img3);
    }
    // If no images, use the default
    if (empty($images)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(ROOT . '/assets/images/pets/default.jpg'));
    }
    ?>

    <script>
        // Embed PHP array into JS array with base64 images
        const images = <?= json_encode($images); ?>;
        let currentImageIndex = 0;

        // Load initial image
        document.getElementById('pet-image').src = images[currentImageIndex];

        // Function to slide to the previous image
        function prevImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                document.getElementById('pet-image').src = images[currentImageIndex];
            }
        }

        // Function to slide to the next image
        function nextImage() {
            if (currentImageIndex < images.length - 1) {
                currentImageIndex++;
                document.getElementById('pet-image').src = images[currentImageIndex];
            }
        }


        // Reveal contact information on click
        document.querySelectorAll('.reveal-info').forEach(function(element) {
            element.addEventListener('click', function() {
                var info = this.getAttribute('data-info');
                this.textContent = info;
            });
        });
    </script>
</body>
</html>
