<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Pets</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pet-post.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
</head>

<body>

    <?php include("../app/views/components/header.php");
    // show($data->name);
    ?>

    <?php $post = $data['post']; ?>
    <div class="lost-pet-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <h1><a href="<?= ROOT ?>/lostandfound">find a pet</a> / for adopting</h1>
        </div>

        <!-- Post Title -->
        <div class="post-title">
            <span></span><span><?= esc($post->name) ?></span>
        </div>

        <!-- Post Info -->
        <div class="post-info">
            <p><?= esc($post->created_at) ?></p>

        </div>

        <!-- Pet Image and Slider -->
        <div class="pet-image-container">
            <button class="slider-arrow left" onclick="prevImage()">&#8249;</button>
            <img id="pet-image" class="pet-image" src='image_to_load' alt="Lost Pet Image">
            <button class="slider-arrow right" onclick="nextImage()">&#8250;</button>
        </div>

        <!-- Pet specs -->
        <span class="price">For the Adoption</span>
        <br><br>
        <div class="specs">
            <p>Pet Type :</p><span><?= esc($post->species) ?></span>
        </div>
        <div class="specs">
            <p>Breed :</p><span><?= esc($post->breed) ?></span>
        </div>
        <div class="specs">
            <p>Sex :</p><span><?= esc($post->sex) ?></span>
        </div>
        <div class="specs">
            <p>Age :</p><span><?= esc($post->age) ?> years</span>
        </div>
        <!-- <div class="specs">
            <p>Color :</p><span>Brown</span>
        </div> -->
        <!-- Extra information initially hidden -->
        <div class="extra-info">
            <div class="specs">
                <p>Height :</p><span><?= esc($post->height) ?> ft</span>
            </div>
            <div class="specs">
                <p>Weight :</p><span><?= esc($post->weight) ?> kg</span>
            </div>
            <!-- <div class="specs">
                <p>Health condition :</p><span>Healthy</span>
            </div> -->
            <div class="specs">
                <p>Pedigree :</p><span><?= $post->pedigree == 1 ? 'Available' : 'Not Available' ?></span>
            </div>
            <div class="specs">
                <p>Neutered status :</p><span><?= $post->neutered == 1 ? 'Yes' : 'No' ?></span>
            </div>
            <div class="specs">
                <p>Vaccinated :</p><span><?= $post->vaccinated == 1 ? 'Yes' : 'No' ?></span>
            </div>

            <div class="specs">
                <p>Trained :</p><span><?= $post->trained == 1 ? 'Yes' : 'No' ?></span>
            </div>
        </div>

        <!-- More button to toggle visibility -->
        <div class="more-button" onclick="toggleExtraInfo()">
            <p id="more-less">More</p> <span>▼</span>
        </div>

        <br><br>

        <!-- Contact Info -->
        <div class="contact-section">
            <!-- <img class="contact-icon" src="<?= ROOT ?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
            <span>Contact : </span> -->
            <div class="contact-info">
                <?php if (isset($_SESSION['role_id'])): ?>
                    <!-- Show Edit and Delete buttons if role_id exists -->
                    <button class="btn btn-primary" onclick="window.location.href='<?= ROOT ?>/shelter/edit_post?id=<?= $post->id ?>'">Edit</button>
                    <button class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this post?')) window.location.href='<?= ROOT ?>/shelter/delete_post?id=<?= $post->id ?>'">Delete</button>
                <?php elseif (isset($_SESSION['user_id'])): ?>
                    <!-- Show Send Adoption Request button if role_id does not exist -->
                    <button class="btn btn-primary" onclick="openPopup()">Send Adoption Request</button>
                <?php endif; ?>
            </div>
        </div>

        <!-- Description -->
        <div class="description-section">
            <h3><?= esc($post->description) ?></h3>

        </div>


        <!-- ADD EVENT FORM -->
        <div id="popupForm" class="popup-container">
            <div class="form-container">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <h2>Enter Adoption Request Information </h2>
                <form id="petForm" action="<?= ROOT ?>/findapet/adoptionpost/adoptionrequest?id=<?= $post->pet_id ?>" method="POST" enctype="multipart/form-data">

                    <label for="name">Adoptor Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="contact_no">Contact Number:</label>
                    <input
                        type="text"
                        id="contact_no"
                        name="contact_no"
                        required
                        pattern="^\d{10}$"
                        maxlength="10"
                        minlength="10"
                        title="Please enter exactly 10 digits">

                    <label for="residence">Residence:</label>
                    <input type="text" id="residence" name="residence" required>

                    <label for="owned_pets">Currently Owned Pets (Number):</label>
                    <input type="number" id="owned_pets" name="owned_pets" min="0" required>

                    <label for="past_pets">Previously Owned Pets:</label>
                    <select id="past_pets" name="past_pets" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="garden_area">Garden Area (in perches):</label>
                    <input
                        type="number"
                        id="garden_area"
                        name="garden_area"
                        min="1"
                        step="1"
                        required
                        title="Please enter a positive whole number">


                    <button class="btn btn-primary" type="submit" name="formsubmit">Submit</button>
                </form>
            </div>
        </div>


        <!-- JS & component includes -->
        <script>
            function openPopup() {
                document.getElementById("popupForm").style.display = "flex";
                document.body.style.overflow = "hidden"; // Disable scrolling
            }

            function closePopup() {
                document.getElementById("popupForm").style.display = "none";
                document.body.style.overflow = "auto"; // Enable scrolling
            }
        </script>
        <script src="<?= ROOT ?>/assets/js/popupform.js"></script>



        <script>
            function toggleExtraInfo() {
                const extraInfo = document.querySelector('.extra-info');
                const moreButton = document.querySelector('.more-button');
                const more_less = document.getElementById("more-less");
                // Toggle between showing and hiding the .extra-info div with animation
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
        </script>

        
        <script>
            // Function to replace the "Click to view" text with actual contact info
            document.querySelectorAll('.reveal-info').forEach(function(element) {
                element.addEventListener('click', function() {
                    var info = this.getAttribute('data-info');
                    this.textContent = info;
                    // this.style.textDecoration = 'none';
                });
            });
        </script>

<?php
    // Prepare the base64 images in PHP
    // print_r($post);
    // exit();
    $images = [];
    if (!empty($post->postimg1)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($post->postimg1);
    }
    if (!empty($post->postimg2)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($post->postimg2);
    }
    if (!empty($post->postimg3)) {
        $images[] = 'data:image/jpeg;base64,' . base64_encode($post->postimg3);
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
    </script>
    </div>
    <?php include("../app/views/components/footer.php"); ?>

</body>


</html>