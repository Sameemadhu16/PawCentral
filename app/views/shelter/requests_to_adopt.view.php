<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests to Adopt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/requestToAdopt.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <div class="content">
            <!-- <h2>Requests to Adopt</h2> -->
            <div class="requests-container">
                <div class="request-card">
                    <div class="card-content">
                        <img src="<?= ROOT ?>/assets/images/pets/merchant/sell1.webp" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Buddy</h3>
                            <p><strong>Breed:</strong> Labrador Retriever</p>
                            <p><strong>Age:</strong> 2 years</p>
                            <hr>
                            <p><strong>Adopter Name:</strong> Jane Doe</p>
                            <p><strong>Contact:</strong> 0712345678</p>
                            <p><strong>Location:</strong> 45, Central Road, Colombo</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
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
                            <p><strong>Adopter Name:</strong> John Smith</p>
                            <p><strong>Contact:</strong> 0712345679</p>
                            <p><strong>Location:</strong> 12, Beach Road, Galle</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
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
                            <p><strong>Adopter Name:</strong> Emily Watson</p>
                            <p><strong>Contact:</strong> 0711122233</p>
                            <p><strong>Location:</strong> 50, Lotus Avenue, Kandy</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
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
                            <p><strong>Adopter Name:</strong> Michael Brown</p>
                            <p><strong>Contact:</strong> 0709876543</p>
                            <p><strong>Location:</strong> 34, Maple Street, Negombo</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
                    </div>
                </div>

                <div class="request-card">
                    <div class="card-content">
                    <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Pet Image" class="pet-image">
                        <div class="details">
                            <h3>Daisy</h3>
                            <p><strong>Breed:</strong> Beagle</p>
                            <p><strong>Age:</strong> 1 year</p>
                            <hr>
                            <p><strong>Adopter Name:</strong> Sarah Johnson</p>
                            <p><strong>Contact:</strong> 0776543210</p>
                            <p><strong>Location:</strong> 88, Green Park, Galle</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
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
                            <p><strong>Adopter Name:</strong> William Davis</p>
                            <p><strong>Contact:</strong> 0781234567</p>
                            <p><strong>Location:</strong> 22, Pearl Lane, Matara</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
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
                            <p><strong>Adopter Name:</strong> Olivia Thompson</p>
                            <p><strong>Contact:</strong> 0723456789</p>
                            <p><strong>Location:</strong> 10, Ocean Drive, Trincomalee</p>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="approve-button">Approve</button>
                        <button class="reject-button">Reject</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>