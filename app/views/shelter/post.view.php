<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/requestToAdopt.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <div class="content">
            <!-- <h2>Posts</h2> -->
            <div class="requests-container">
                <div class="request-card">
                    <div class="card-content">
                        <img src="<?= ROOT ?>/assets/images/pets/merchant/sell1.webp" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Buddy</h3>
                            <p><strong>Breed:</strong> Labrador Retriever</p>
                            <p><strong>Age:</strong> 2 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                        <img src="<?= ROOT ?>/assets/images/pets/merchant/sell2.webp" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Milo</h3>
                            <p><strong>Breed:</strong> Pomeranian</p>
                            <p><strong>Age:</strong> 3 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                        <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Max</h3>
                            <p><strong>Breed:</strong> Golden Retriever</p>
                            <p><strong>Age:</strong> 4 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                        <img src="<?= ROOT ?>/assets/images/pets/petres_2.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Luna</h3>
                            <p><strong>Breed:</strong> Siberian Husky</p>
                            <p><strong>Age:</strong> 2 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <!-- <div class="request-card">
                    <div class="card-content">
                    <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Daisy</h3>
                            <p><strong>Breed:</strong> Beagle</p>
                            <p><strong>Age:</strong> 1 year</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                    <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Rocky</h3>
                            <p><strong>Breed:</strong> Boxer</p>
                            <p><strong>Age:</strong> 5 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                    <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Charlie</h3>
                            <p><strong>Breed:</strong> Border Collie</p>
                            <p><strong>Age:</strong> 3 years</p>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Edit</button>
                        <button class="reject-button">Remove</button>
                    </div>
                </div> -->

            </div>

        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>