<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Dashboard-Adoption Postinfo</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pet-post.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 400px;
            max-width: 90%;
            animation: slideIn 0.3s ease;
            overflow: hidden;
        }

        .modal-header {
            background-color: #f8f9fa;
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .modal-header h3 {
            margin: 0;
            color: #333;
            font-size: 20px;
            font-weight: 600;
        }

        .modal-body {
            padding: 25px 20px;
            text-align: center;
        }

        .warning-icon {
            font-size: 40px;
            color: #ff9800;
            margin-bottom: 15px;
            display: block;
        }

        .modal-body p {
            margin: 0 0 10px 0;
            font-size: 18px;
            color: #333;
        }

        .modal-subtitle {
            color: #777;
            font-size: 14px;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: flex-end;
        }

        .modal-footer form {
            display: flex;
            gap: 10px;
            width: 100%;
            justify-content: flex-end;
        }

        .modal-content button {
            padding: 10px 16px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .confirm-button {
            background-color: var(--danger);
            color: #fff;
        }

        .cancel-button {
            background-color: var(--primary);
            color: #fff;
        }

        .confirm-button:hover {
            background-color: var(--danger-dark);
        }

        .cancel-button:hover {
            background-color: var(--primary-dark);
        }

        .modal-content button i {
            margin-right: 6px;
        }
    </style>
</head>

<body>

    <?php include("../app/views/components/header.php");
    // show($data->name);

    ?>



    <?php $post = $data['post'];
    // show($post);
    ?>
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
            <p>Age (In Months):</p><span><?= esc($post->age) ?> months</span>
        </div>
        <!-- <div class="specs">
            <p>Color :</p><span>Brown</span>
        </div> -->
        <!-- Extra information initially hidden -->
        <div class="extra-info">
            <div class="specs">
                <p>Height :</p><span><?= esc($post->height) ?> cm</span>
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

        <!-- Description -->
        <div class="description-section">
            <h3>Description</h3>
            <p>
                <?= $post->description ?>
            </p>
        </div>


        <!-- Contact Info -->
        <div class="contact-section">
            <!-- <img class="contact-icon" src="<?= ROOT ?>/assets/images/logos/call.png" alt="Contact Icon" width="30px">
            <span>Contact : </span> -->
            <div class="contact-info">

                <!-- Show Edit and Delete buttons if role_id exists -->
                <button class="btn btn-primary" onclick="window.location.href='<?= ROOT ?>/shelter/postupdate?id=<?= $post->pet_id ?>'">
                    Edit
                </button>

                <button class="btn btn-danger" onclick="openDeleteModal(<?= $post->pet_id ?>)">Delete</button>

            </div>
        </div>

        <!-- Delete confirmation modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Confirm Deletion</h3>
                </div>
                <div class="modal-body">
                    <i class="fas fa-exclamation-triangle warning-icon"></i>
                    <p>Are you sure you want to delete this post?</p>
                    <p class="modal-subtitle">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <input type="hidden" name="pet_id" value="<?= $post->pet_id ?>">
                        <button type="button" onclick="closeDeleteModal()" class="cancel-button">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="confirm-button" name="deletepost">
                            <i class="fas fa-check"></i> Yes, Delete
                        </button>
                    </form>
                </div>
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
            function openDeleteModal() {
                document.getElementById('deleteModal').style.display = 'flex';
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').style.display = 'none';
            }

            function confirmDelete() {
                alert("Delete action confirmed.");
                closeDeleteModal();
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