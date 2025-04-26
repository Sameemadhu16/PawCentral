<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Adoption Posts</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/post.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        .accepted-banner {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: bold;
            z-index: 10;
        }
    </style>
</head>

<body class="body">

    <!-- Header -->
    <?php include("../app/views/components/header.php");
    // show($data);
    ?>

    <div class="main-container container">
        <!-- Sidebar -->
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <!-- Main Content -->
        <div class="user-accounts-section">
            <div class="posts-sec">

                <?php if (!empty($posts)): ?>
                    <div class="topicnbuttons">
                        <button class="add-post fixedsize" onclick="openPopup()">Add Adoption Post</button>
                    </div>

                    <div class="topicnbuttons">
                        <h2>Adoption Posts</h2>
                    </div>

                    <div class="post-list">
                        <?php 
                        $hasPosts = false;
                        foreach ($posts as $post): 
                            if ($post->is_deleted == 0 && $post->status == 0): 
                                $hasPosts = true;
                        ?>
                            <div class="post-card" onclick="window.location.href='<?= ROOT ?>/shelter/postinfo?id=<?= $post->pet_id ?>'">
                                <div class="post-card-content">
                                    <!-- Post Images -->
                                    <div class="post-images">
                                        <div class="carousel">
                                            <div class="carousel-inner">
                                                <?php foreach ([$post->postimg1] as $index => $image): ?>
                                                    <?php if ($image): ?>
                                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                            <img class="post-image" src="<?= htmlspecialchars($image) ?>" alt="Post Image">
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Post Details -->
                                    <div class="post-details">
                                        <h3 class="hide_overflow"><?= htmlspecialchars($post->name) ?></h3>
                                        <p><strong>Species:</strong> <?= htmlspecialchars($post->species) ?></p>
                                        <p><strong>Age:</strong> <?= htmlspecialchars($post->age) ?> Months</p>
                                        <p><strong>Breed:</strong> <?= htmlspecialchars($post->breed) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endif; 
                        endforeach; 
                        ?>

                        <?php if (!$hasPosts): ?>
                            <p style="text-align: center; font-size: 1.2rem; color: #555; margin-top: 20px;">
                                There are no posts here.
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- New Section for Accepted Posts -->
                    <div class="topicnbuttons">
                        <h2>Accepted Adoption Requests</h2>
                    </div>

                    <div class="post-list">
                        <?php 
                        $hasAcceptedPosts = false;
                        foreach ($posts as $post): 
                            if ($post->status == 1 && $post->is_deleted == 0): 
                                $hasAcceptedPosts = true;
                        ?>
                            <div class="post-card">
                                <div class="post-card-content">
                                    <!-- Post Images -->
                                    <div class="post-images">
                                        <div class="carousel">
                                            <div class="carousel-inner">
                                                <?php foreach ([$post->postimg1] as $index => $image): ?>
                                                    <?php if ($image): ?>
                                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                            <img class="post-image" src="<?= htmlspecialchars($image) ?>" alt="Post Image">
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Post Details -->
                                    <div class="post-details">
                                        <h3 class="hide_overflow"><?= htmlspecialchars($post->name) ?></h3>
                                        <p><strong>Species:</strong> <?= htmlspecialchars($post->species) ?></p>
                                        <p><strong>Age:</strong> <?= htmlspecialchars($post->age) ?> Months</p>
                                        <p><strong>Breed:</strong> <?= htmlspecialchars($post->breed) ?></p>
                                    </div>

                                    <!-- Accepted Banner -->
                                    <div class="accepted-banner">
                                        <p>Adoption Request Accepted</p>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endif; 
                        endforeach; 
                        ?>

                        <?php if (!$hasAcceptedPosts): ?>
                            <p style="text-align: center; font-size: 1.2rem; color: #555; margin-top: 20px;">
                                There are no accepted posts here.
                            </p>
                        <?php endif; ?>
                    </div>

                <?php else: ?>
                    <!-- If no posts -->
                    <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">
                            You have no added posts yet.<br>
                            <button class="add-post fixedsize" onclick="openPopup()">Add New Post</button>
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- Popup Form -->
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Enter Adoption Post Information</h2>

            <form id="petForm" action="<?= ROOT ?>/shelter/post/addpost" method="POST" enctype="multipart/form-data">
                <!-- Form Inputs -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="species">Pet Type :</label>
                <select id="type" name="species" onchange="updateBreedOptions()" required>
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                    <option value="Other">Other</option>
                </select>

                <label for="breed">Breed:</label>
                <select id="breed" name="breed" required>
                    <option value="Other">Other</option>
                </select>

                <script>
                    // Define breed options for each animal type
                    const breedOptions = {
                        Dog: [{
                                value: "Pomeranian",
                                text: "Pomeranian"
                            },
                            {
                                value: "German Shepherd",
                                text: "German Shepherd"
                            },
                            {
                                value: "Labrador",
                                text: "Labrador"
                            },
                            {
                                value: "Bulldog",
                                text: "Bulldog"
                            },
                            {
                                value: "Beagle",
                                text: "Beagle"
                            },
                            {
                                value: "Golden Retriever",
                                text: "Golden Retriever"
                            },
                            {
                                value: "Poodle",
                                text: "Poodle"
                            },
                            {
                                value: "Rottweiler",
                                text: "Rottweiler"
                            },
                            {
                                value: "Dachshund",
                                text: "Dachshund"
                            },
                            {
                                value: "Siberian Husky",
                                text: "Siberian Husky"
                            },
                            {
                                value: "Boxer",
                                text: "Boxer"
                            },
                            {
                                value: "Shih Tzu",
                                text: "Shih Tzu"
                            },
                            {
                                value: "Chihuahua",
                                text: "Chihuahua"
                            },
                            {
                                value: "Doberman",
                                text: "Doberman"
                            },
                            {
                                value: "Great Dane",
                                text: "Great Dane"
                            },
                            {
                                value: "Corgi",
                                text: "Corgi"
                            },
                            {
                                value: "Australian Shepherd",
                                text: "Australian Shepherd"
                            },
                            {
                                value: "Border Collie",
                                text: "Border Collie"
                            },
                            {
                                value: "Pug",
                                text: "Pug"
                            },
                            {
                                value: "French Bulldog",
                                text: "French Bulldog"
                            },
                        ],
                        Cat: [{
                                value: "Persian",
                                text: "Persian"
                            },
                            {
                                value: "Siamese",
                                text: "Siamese"
                            },
                            {
                                value: "Maine Coon",
                                text: "Maine Coon"
                            },
                            {
                                value: "Bengal",
                                text: "Bengal"
                            },
                            {
                                value: "Sphynx",
                                text: "Sphynx"
                            },
                            {
                                value: "Ragdoll",
                                text: "Ragdoll"
                            },
                            {
                                value: "British Shorthair",
                                text: "British Shorthair"
                            },
                            {
                                value: "Scottish Fold",
                                text: "Scottish Fold"
                            },
                            {
                                value: "Russian Blue",
                                text: "Russian Blue"
                            },
                            {
                                value: "American Shorthair",
                                text: "American Shorthair"
                            },
                            {
                                value: "Norwegian Forest",
                                text: "Norwegian Forest"
                            },
                            {
                                value: "Abyssinian",
                                text: "Abyssinian"
                            },
                            {
                                value: "Birman",
                                text: "Birman"
                            },
                            {
                                value: "Oriental Shorthair",
                                text: "Oriental Shorthair"
                            },
                            {
                                value: "Devon Rex",
                                text: "Devon Rex"
                            },
                            {
                                value: "Cornish Rex",
                                text: "Cornish Rex"
                            },
                            {
                                value: "Burmese",
                                text: "Burmese"
                            },
                            {
                                value: "Tonkinese",
                                text: "Tonkinese"
                            },
                            {
                                value: "Savannah",
                                text: "Savannah"
                            },
                        ],
                        Other: [],
                    };

                    function updateBreedOptions() {
                        const typeSelect = document.getElementById("type");
                        const breedSelect = document.getElementById("breed");

                        // Clear existing breed options
                        breedSelect.innerHTML = '<option value="Other">Other</option>';

                        // Get the selected animal type
                        const selectedType = typeSelect.value;

                        // Populate breed options based on the selected animal type
                        if (breedOptions[selectedType]) {
                            breedOptions[selectedType].forEach((breed) => {
                                const option = document.createElement("option");
                                option.value = breed.value;
                                option.textContent = breed.text;
                                breedSelect.appendChild(option);
                            });
                        }
                    }
                </script>

                <label>Sex:</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="sex" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="sex" value="Female" required>
                    <label for="female">Female</label>
                </div>

                <label for="age">Age(In Month):</label>
                <input type="number" id="age" name="age" min="1" max="240" required>

                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" min="5" max="100" required>

                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" min="0.00" max="150" required>

                <script>
                    document.querySelector('form').addEventListener('submit', function(event) {
                        const age = document.getElementById('age').value;
                        const height = document.getElementById('height').value;
                        const weight = document.getElementById('weight').value;

                        // Validate age in months
                        if (age < 1 || age > 240) {
                            alert('Age must be between 1 and 240 months.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Validate height
                        if (height < 5 || height > 100) {
                            alert('Height must be between 5 and 100 cm.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Validate weight
                        if (weight < 0.02 || weight > 150) {
                            alert('Weight must be between 20g and 150 kg.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // If all validations pass, the form will submit
                    });
                </script>

                <label for="pedigree">Pedigree:</label>
                <select id="pedigree" name="pedigree" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="neutered">Neutered:</label>
                <select id="neutered" name="neutered" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="trained">Trained:</label>
                <select id="trained" name="trained" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="vaccinated">Vaccinated:</label>
                <select id="vaccinated" name="vaccinated" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="postimg">Upload up to 3 photos:</label>
                <input type="file" id="postimg" name="photos[]" accept="image/*" multiple required>

                <!-- Image Preview -->
                <div id="imagePreviewContainer"></div>

                <script>
                    document.getElementById('postimg').addEventListener('change', function() {
                        const maxFiles = 3;
                        const fileInput = this;

                        if (fileInput.files.length > maxFiles) {
                            alert(`You can upload a maximum of ${maxFiles} images.`);
                            fileInput.value = ''; // Clear input
                        } else {
                            const previewContainer = document.getElementById('imagePreviewContainer');
                            previewContainer.innerHTML = ''; // Clear previews

                            Array.from(fileInput.files).forEach(file => {
                                if (file.type.startsWith('image/')) {
                                    const img = document.createElement('img');
                                    img.src = URL.createObjectURL(file);
                                    img.style.width = '100px';
                                    img.style.margin = '5px';
                                    previewContainer.appendChild(img);
                                }
                            });
                        }
                    });
                </script>

                <label for="postdesc">Description:</label>
                <textarea id="postdesc" name="postdesc" rows="5" placeholder="Provide additional details about the pet."></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include("../app/views/components/footer.php"); ?>

    <!-- JS Scripts -->
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden";
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto";
        }
    </script>

    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>

    <script>
        let currentSlide = 0;

        function moveSlide(direction) {
            const items = document.querySelectorAll('.carousel-item');
            items[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + direction + items.length) % items.length;
            items[currentSlide].classList.add('active');
        }

        function editPost(postId) {
            window.location.href = `<?= ROOT ?>/shelter/post/edit/${postId}`;
        }

        function deletePost(postId) {
            if (confirm("Are you sure you want to delete this post?")) {
                window.location.href = `<?= ROOT ?>/shelter/post/delete/${postId}`;
            }
        }
    </script>

    <style>

    </style>

</body>

</html>