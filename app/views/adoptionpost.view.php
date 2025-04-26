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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Show Send Adoption Request button if the user is logged in -->
                    <button class="btn btn-primary" onclick="openPopup()">Send Adoption Request</button>
                <?php else: ?>
                    <!-- Show contact shelter statement if the user is not logged in -->
                    <p>Please contact the shelter for more details. <a class="btn btn-primary" href="<?= ROOT ?>/petshelters/details?id=<?= $post->shelter_id ?>" style="text-decoration: none;">Visit Shelter</a></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Description -->
        <div class="description-section">
            <h3>Description</h3>
            <p>
                <?= $post->description ?>
            </p>
        </div>


        <!-- ADD EVENT FORM -->
        <div id="popupForm" class="popup-container">
            <div class="form-container">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <h2>Enter Adoption Request Information </h2>
                <form id="petForm" action="<?= ROOT ?>/findapet/adoptionpost/adoptionrequest?id=<?= $post->pet_id ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                <script>
                    function validateForm() {
                        let isValid = true;

                        // Validate Adoptor Name
                        const name = document.getElementById('name').value.trim();
                        if (name.length < 2) {
                            alert("Adoptor Name must be at least 2 characters long.");
                            isValid = false;
                        }

                        // Validate Contact Number
                        const contactNo = document.getElementById('contact_no').value.trim();
                        const contactNoPattern = /^\d{10}$/;
                        if (!contactNoPattern.test(contactNo)) {
                            alert("Contact Number must be exactly 10 digits.");
                            isValid = false;
                        }

                        // Validate Residence
                        const residence = document.getElementById('residence').value.trim();
                        if (residence.length < 3) {
                            alert("Residence must be at least 3 characters long.");
                            isValid = false;
                        }

                        // Validate Owned Pets
                        const ownedPets = document.getElementById('owned_pets').value;
                        if (ownedPets < 0) {
                            alert("Currently Owned Pets must be a non-negative number.");
                            isValid = false;
                        }

                        // Validate Garden Area
                        const gardenArea = document.getElementById('garden_area').value;
                        if (gardenArea < 1) {
                            alert("Garden Area must be at least 1 perch.");
                            isValid = false;
                        }

                        return isValid;
                    }
                </script>
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

        <!-- <script>
            // Example data array to simulate pet posts
            // const petPost = {
            //     name: "Tiny",
            //     breed: "tinie tynie",
            //     postedOn: "Sun, 5th September, 4:02 PM",
            //     location: "36/2 Sri lankarama rd - Panadura",
            //     images: [
            //         '<?= ROOT ?>/assets/images/pets/catfound.jpg',
            //         '<?= ROOT ?>/assets/images/pets/cat1.jpg',
            //         '<?= ROOT ?>/assets/images/pets/cat4.jpg'
            //     ],
            //     contact: "071 542 4452",
            //     contactName: "Shehan",
            //     description: `LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            // orem ipsum dolor sLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            // orem ipsum doloLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            // orem ipsum doloLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            // orem ipsum doloit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.`
            // };

            let currentImageIndex = 0;

            // Fill the page with data from the array
            window.onload = function() {
                document.getElementById('pet-name').textContent = petPost.name;
                document.getElementById('pet-image').src = petPost.images[currentImageIndex];
                document.getElementById('pet-breed').textContent = petPost.breed;
                document.getElementById('posted-on').textContent = `Posted on ${petPost.postedOn}`;
                document.getElementById('pet-description').textContent = petPost.description;
                document.getElementById('contact-number').textContent = petPost.contact;
            };
            // Function to slide to the previous image
            function prevImage() {
                if (currentImageIndex > 0) {
                    currentImageIndex--;
                    document.getElementById('pet-image').src = petPost.images[currentImageIndex];
                }
            }

            // Function to slide to the next image
            function nextImage() {
                if (currentImageIndex < petPost.images.length - 1) {
                    currentImageIndex++;
                    document.getElementById('pet-image').src = petPost.images[currentImageIndex];
                }
            }
        </script> -->

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
    </div>
    <?php include("../app/views/components/footer.php"); ?>

</body>


</html>