<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/pet-post.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php");?>

    <div class="lost-pet-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <h1><a href="<?=ROOT?>/lostandfound">find a pet</a> / <span class="tradeType">Selling</span></h1>
        </div>

        <!-- Post Title -->
        <div class="post-title">
            <span class="petName">Tiny</span> - <span class="breed">German Shepherd</span>
        </div>

        <!-- Post Info -->
        <div class="post-info">
            <p class="created_at">Posted on Sun, 5th September, 4:00 PM</p>
        </div>

        <!-- Pet Image and Slider -->
        <div class="pet-image-container">
            <button class="slider-arrow left" onclick="prevImage()">&#8249;</button>
            <img id="pet-image" class="pet-image" src='' alt="Pet Image">
            <button class="slider-arrow right" onclick="nextImage()">&#8250;</button>
        </div>

        <!-- Pet specs -->
        <span class="price">Rs. 11,000</span>
        <br><br>
        <div class="specs"><p>Trade Type:</p><span class="tradeType">Selling</span></div>
        <div class="specs"><p>Species:</p><span class="species">Dog</span></div>
        <div class="specs"><p>Breed:</p><span class="breed">German Shepherd</span></div>
        <div class="specs"><p>Sex:</p><span class="sex">Male</span></div>
        <div class="specs"><p>Age:</p><span class="age">3 months</span></div>

        <!-- Extra information initially hidden -->
        <div class="extra-info">
            <div class="specs"><p>Height:</p><span class="height">1 ft</span></div>
            <div class="specs"><p>Weight:</p><span class="weight">1.5 kg</span></div>
            <div class="specs"><p>Neutered:</p><span class="neutered">No</span></div>
            <div class="specs"><p>Trained:</p><span class="trained">Yes</span></div>
            <div class="specs"><p>Pedigree:</p><span class="pedigree">Available</span></div>
            <div class="specs"><p>Vaccinated:</p><span class="vaccinated">Yes</span></div>
            <div class="specs"><p>Price Negotiable:</p><span class="fee_negotiable">No</span></div>
        </div>

        <!-- More button to toggle visibility -->
        <div class="more-button" onclick="toggleExtraInfo()"><p id="more-less">More</p> <span>▼</span></div>

        <br><br>

        <!-- Seller Details -->
        <div class="specs"><p>Location:</p><span class="City">Panadura</span></div>
        <div class="specs"><p>Address:</p><span class="Exact_address">36/2 Sri Lankarama Rd</span></div>

        <!-- Contact Info -->
        <div class="contact-section">
            <img class="contact-icon" src="<?=ROOT?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
            <span>Contact: </span>
            <div class="contact-info">
                <span class="contactName">The PetShop</span><br>
                <span class="contactNumber reveal-info" data-info="+1-123-456-7890">
                    0xx xxx xxxx<br>
                    <div class="info">Click to show</div>
                </span>
            </div>
        </div>

        <!-- Description -->
        <div class="description-section">
            <h3>Description</h3>
            <p class="description">
                No description added
            </p>
        </div>
    </div>
    <script>
        // Image slider functionality
        let currentImageIndex = 0;
        const petImages = [
            'img1.jpg',
            'img2.jpg',
            'img3.jpg'
        ];

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

        // Toggle extra info
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

        // Reveal contact info
        document.querySelectorAll('.reveal-info').forEach(function(element) {
            element.addEventListener('click', function() {
                var info = this.getAttribute('data-info');
                this.innerHTML = info;
            });
        });
    </script>
</body>
</html>