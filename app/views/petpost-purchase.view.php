<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Pets</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/pet-post.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php");?>

    <div class="lost-pet-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <h1><a href="<?=ROOT?>/lostandfound">find a pet</a> / for buying</h1>
        </div>

        <!-- Post Title -->
        <div class="post-title">
            <span id="pet-name">Tiny</span> - <span id="pet-breed">German Shepherd</span>
        </div>

        <!-- Post Info -->
        <div class="post-info">
            <p id="posted-on">Posted on Sun, 5th September, 4:00 PM</p>
            
        </div>

        <!-- Pet Image and Slider -->
        <div class="pet-image-container">
            <button class="slider-arrow left" onclick="prevImage()">&#8249;</button>
            <img id="pet-image" class="pet-image" src='image_to_load' alt="Lost Pet Image">
            <button class="slider-arrow right" onclick="nextImage()">&#8250;</button>
        </div>

        <!-- Pet specs -->
        <span class="price">Rs. 11 000</span>
        <br><br>
        <div class="specs"><p>Pet Type :</p><span>Dog</span></div>
        <div class="specs"><p>Breed :</p><span>German Shepherd</span></div>
        <div class="specs"><p>Sex :</p><span>Male</span></div>
        <div class="specs"><p>Age :</p><span>3 months</span></div>
        <div class="specs"><p>Color :</p><span>Brown</span></div>
          <!-- Extra information initially hidden -->
        <div class="extra-info">
            <div class="specs"><p>Height :</p><span>1 ft</span></div>
            <div class="specs"><p>Weight :</p><span>1.5 kg</span></div>
            <div class="specs"><p>Health condition :</p><span>Healthy</span></div>
            <div class="specs"><p>Pedigree :</p><span>Available</span></div>
            <div class="specs"><p>Neutered status :</p><span>No</span></div>
            <div class="specs"><p>Vaccinated :</p><span>Yes</span></div>
            <div class="specs"><p>Rabies Vaccine :</p><span>Yes</span></div>
            <div class="specs"><p>FVRCP Vaccine :</p><span>No</span></div>
            <div class="specs"><p>Trained :</p><span>Yes</span></div>
        </div>

    <!-- More button to toggle visibility -->
    <div class="more-button" onclick="toggleExtraInfo()"><p id="more-less">More</p> <span>▼</span></div>

    <br><br>

        <!-- Seller Details -->
        <div class="specs"><p>Sold by :</p><span>The PetShop</span></div>
        <div class="specs"><p>Location :</p><span>Panadura</span></div>

        <!-- Contact Info -->
        <div class="contact-section">
            <img class="contact-icon" src="<?=ROOT?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
            <span>Contact : </span>
            <div class="contact-info">
                <!-- Contact Info placeholders -->
                <span id="phone" class="reveal-info" data-info="+1-123-456-7890">0xx xxx xxxx<br><div class="info">Click to show</div></span>
            </div>
        </div>

        <!-- Description -->
        <div class="description-section">
            <h3>Description</h3>
            <p id="pet-description">
                No description added
            </p>
        </div>


    
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
        // Example data array to simulate pet posts
        const petPost = {
            name: "Tiny",
            breed: "tinie tynie",
            postedOn: "Sun, 5th September, 4:02 PM",
            location: "36/2 Sri lankarama rd - Panadura",
            images: [
                '<?= ROOT?>/assets/images/pets/bambi_1.jpg',
                '<?= ROOT?>/assets/images/pets/bambi_2.jpg',
                '<?= ROOT?>/assets/images/pets/bambi_3.jpeg'
            ],
            contact: "071 542 4452",
            contactName: "Shehan",
            description: `LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            orem ipsum dolor sLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            orem ipsum doloLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            orem ipsum doloLLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            orem ipsum doloit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.`
        };

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

</body>
</html>
