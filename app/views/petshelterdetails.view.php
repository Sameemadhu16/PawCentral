<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($shelter->name) ?> - Shelter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shop.css">
</head>

<body>
    <?php include("../app/views/components/header.php");
    // show($data['postcards']);
    ?>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="image_section">
                <?php if (!empty($user->profile_pic)): ?>
                    <img src="<?= ROOT ?>/<?= esc($user->profile_pic) ?>" alt="Shelter Profile Picture">
                <?php else: ?>
                    <img src="<?= ROOT ?>/assets/images/default-profile.png" alt="Default Profile Picture">
                <?php endif; ?>
            </div>
            <div class="info_section">
                <div class="service_name">
                    <h1 class="nam"><?= esc($shelter->name) ?></h1>
                    <p class="loc">Location: <?= esc($shelter->location) ?></p>
                    <p class="loc">Address: <?= esc($user->address) ?></p>
                </div>
                <div class="about">
                    <h2>About Us</h2>
                    <p><?= !empty($shelter->description) ? esc($shelter->description) : "No description available." ?></p>
                </div>
                <div class="contact_button">
                    <button class="contact-btn" id="contactToggleBtn" data-number="<?= esc($user->mobile_no) ?>">Contact Us</button>
                </div>
            </div>
        </div>

        <!-- Shelter Details Section -->
        <div class="shelter-details">
            <h2>Shelter Details</h2>
            <p><strong>Capacity:</strong> <?= !empty($shelter->capacity) ? esc($shelter->capacity) : "Not specified" ?></p>

        </div>

        <!-- Products Section -->
        <h2>Our Pets</h2>
        <div class="product-grid">
            <?php foreach ($data['postcards'] as $posts): ?>
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post):

                    ?>
                        <?php if ($post->status == 0 && $post->is_deleted == 0):
                            // show($post->postimg1);
                        ?>

                            <a class="product-card" href="<?= ROOT ?>/findapet/adoption?id=<?= $post->pet_id ?>">
                                <div class="product-image">
                                    <?php if (!empty($post->postimg1)): ?>
                                        <img src="<?= esc($post->postimg1) ?>" alt="Pet Image">
                                    <?php else: ?>
                                        <div class="no-image">No Image Available</div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-details">
                                    <h3><?= esc($post->name) ?></h3>
                                    <p><strong>Species:</strong> <?= esc($post->species) ?></p>
                                    <p><strong>Breed:</strong> <?= esc($post->breed) ?></p>
                                    <p><strong>Age:</strong> <?= esc($post->age) ?> years</p>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products available.</p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        const contactBtn = document.getElementById('contactToggleBtn');
        const originalText = 'Contact Us';
        const contactNumber = contactBtn.getAttribute('data-number');

        contactBtn.addEventListener('click', function() {
            if (contactBtn.textContent === originalText) {
                contactBtn.textContent = contactNumber;
            } else {
                contactBtn.textContent = originalText;
            }
        });
    </script>
</body>

</html>