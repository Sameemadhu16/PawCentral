<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Posts</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/post.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
                        <h2>All Posts</h2>
                    </div>

                    <div class="post-list">
                        <?php foreach ($posts as $post) : 
                            show($post->pet_id)
                            ?>
                            <div class="post-card" onclick="window.location.href='<?= ROOT ?>/shelter/postinfo?id=<?=$post->pet_id?>'">
                                <div class=" post-card-content">

                                <!-- Post Images -->
                                <div class="post-images">
                                    <div class="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ([$post->postimg1, $post->postimg2, $post->postimg3] as $index => $image): ?>
                                                <?php if ($image): ?>
                                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                        <img class="post-image" src="<?= htmlspecialchars($image) ?>" alt="Post Image">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
                                        <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
                                    </div>
                                </div>

                                <!-- Post Details -->
                                <div class="post-details">
                                    <h3 class="hide_overflow"><?= htmlspecialchars($post->name) ?></h3>
                                    <p><strong>Species:</strong> <?= htmlspecialchars($post->species) ?></p>
                                    <p><strong>Age:</strong> <?= htmlspecialchars($post->age) ?> years</p>
                                    <p><strong>Breed:</strong><?= htmlspecialchars($post->breed) ?></p>
                                </div>

                                <!-- Action Buttons -->
                                <!-- <div class="post-actions">
                                    <button class="edit-btn" onclick="editPost(<?= $post->id ?>)">Edit</button>
                                    <button class="delete-btn" onclick="deletePost(<?= $post->id ?>)">Delete</button>
                                </div> -->
                            </div>
                    </div>
                <?php endforeach; ?>
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
                <select id="species" name="species" required>
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                    <option value="Other">Other</option>
                </select>

                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required>

                <label for="sex">Sex:</label>
                <select id="sex" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" min="0" required>

                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" min="0" required>

                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" min="0" required>

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