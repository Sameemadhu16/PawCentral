<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Post Details</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/pet-post.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>

<?php include("../app/views/components/header.php");?>

<div class="lost-pet-container">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <h1><a href="<?=ROOT?>/lostandfound">find a pet</a> / <span class="tradeType"><?= $post->tradeType ?></span></h1>
    </div>

    <!-- Post Title -->
    <div class="post-title">
        <span class="petName"><?= $post->petName ?></span> - <span class="breed"><?= $post->breed ?></span>
    </div>

    <!-- Post Info -->
    <div class="post-info">
        <p class="created_at">Posted on <?= $post->created_at ?></p>
    </div>

    <!-- Pet Image and Slider -->
    <div class="pet-image-container">
        <button class="slider-arrow left" onclick="prevImage()">&#8249;</button>
        <img id="pet-image" class="pet-image" src="<?= $post->img1 ?>" alt="Pet Image">
        <button class="slider-arrow right" onclick="nextImage()">&#8250;</button>
    </div>

    <!-- Price -->
    <span class="price">Rs. <?= $post->price ?></span>
    <br><br>

    <!-- Pet specs -->
    <div class="specs"><p>Trade Type:</p><span class="tradeType"><?= $post->tradeType ?></span></div>
    <div class="specs"><p>Species:</p><span class="species"><?= $post->species ?></span></div>
    <div class="specs"><p>Breed:</p><span class="breed"><?= $post->breed ?></span></div>
    <div class="specs"><p>Sex:</p><span class="sex"><?= $post->sex ?></span></div>
    <div class="specs"><p>Age:</p><span class="age"><?= $post->age ?></span></div>

    <!-- Extra information -->
    <div class="extra-info">
        <div class="specs"><p>Height:</p><span class="height"><?= $post->height ?></span></div>
        <div class="specs"><p>Weight:</p><span class="weight"><?= $post->weight ?></span></div>
        <div class="specs"><p>Neutered:</p><span class="neutered"><?= $post->neutered ? 'Yes' : 'No' ?></span></div>
        <div class="specs"><p>Trained:</p><span class="trained"><?= $post->trained ? 'Yes' : 'No' ?></span></div>
        <div class="specs"><p>Pedigree:</p><span class="pedigree"><?= $post->pedigree ? 'Available' : 'Not Available' ?></span></div>
        <div class="specs"><p>Vaccinated:</p><span class="vaccinated"><?= $post->vaccinated ? 'Yes' : 'No' ?></span></div>
        <div class="specs"><p>Price Negotiable:</p><span class="fee_negotiable"><?= $post->fee_negotiable ?></span></div>
    </div>

    <!-- More button to toggle visibility -->
    <div class="more-button" onclick="toggleExtraInfo()"><p id="more-less">More</p> <span>▼</span></div>

    <br><br>

    <!-- Seller Details -->
    <div class="specs"><p>Location:</p><span class="City"><?= $post->City ?></span></div>
    <div class="specs"><p>Address:</p><span class="Exact_address"><?= $post->Exact_address ?></span></div>

    <!-- Contact Info -->
    <div class="contact-section">
        <img class="contact-icon" src="<?=ROOT?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
        <span>Contact: </span>
        <div class="contact-info">
            <span class="contactName"><?= $post->contactName ?></span><br>
            <span class="contactNumber reveal-info" data-info="<?= $post->contactNumber ?>">
                0xx xxx xxxx<br>
                <div class="info">Click to show</div>
            </span>
        </div>
    </div>

    <!-- Description -->
    <div class="description-section">
        <h3>Description</h3>
        <p class="description">
            <?= $post->description ?: 'No description added' ?>
        </p>
    </div>
</div>

<script>
    let currentImageIndex = 0;
    const petImages = [
        '<?= $post->img1 ?>',
        '<?= $post->img2 ?>',
        '<?= $post->img3 ?>',
        '<?= $post->img4 ?>',
        '<?= $post->img5 ?>'
    ].filter(Boolean);

    function prevImage() {
        if (currentImageIndex > 0) {
            currentImageIndex--;
            document.getElementById('pet-image').src = petImages[currentImageIndex];
        }
    }

    function nextImage() {
        if (currentImageIndex < petImages.length - 1) {
            currentImageIndex++;
            document.getElementById('pet-image').src = petImages[currentImageIndex];
        }
    }

    function toggleExtraInfo() {
        const extraInfo = document.querySelector('.extra-info');
        const moreButton = document.querySelector('.more-button');
        const more_less = document.getElementById("more-less");

        if (extraInfo.classList.contains('open')) {
            extraInfo.classList.remove('open');
            moreButton.classList.remove('active');
            more_less.innerHTML = 'More';
        } else {
            extraInfo.classList.add('open');
            moreButton.classList.add('active');
            more_less.innerHTML = 'Less';
        }
    }

    document.querySelectorAll('.reveal-info').forEach(function(element) {
        element.addEventListener('click', function() {
            var info = this.getAttribute('data-info');
            this.innerHTML = info;
        });
    });
</script>

</body>
</html>
