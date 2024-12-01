<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/mediCenter.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="hero">
            <div class="medimage">
                <img src="<?= ROOT ?>/assets/images/shop.png" alt="Medical Image">
            </div>
            <div class="medi_info">
                <div class="medi_name">
                    <h1>Medical Center Name</h1>
                    <p>Location</p>
                </div>
                <div class="about">
                    <h2>About Us:</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                </div>
                <div class="appointment_btn">
                    <a href="<?=ROOT?>/medical-appointment-date">
                        <button>Book Appointment</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="services">
            <h2>Our Services</h2>
            <div class="service_cards_collection">
                <div class="service_card">
                    <img src="<?= ROOT ?>/assets/images/shop.png" alt="Service">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                </div>
                <div class="service_card">
                    <img src="<?= ROOT ?>/assets/images/shop.png" alt="Service">
                    <h3>Service 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                </div>
            </div>
        </div>
        <div class="veterinarians">
            <h2>Our Veterinarians</h2>
            <div class="vet_cards_collection">  
                <div class="vet_card">
                    <img src="<?= ROOT ?>/assets/images/vet.png" alt="Veterinarian 1">
                    <h3>Veterinarian 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                </div>
                <div class="vet_card">
                    <img src="<?= ROOT ?>/assets/images/vet.png" alt="Veterinarian 2">
                    <h3>Veterinarian 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                </div>
            </div>
        </div>
        
        <div class="contact">
            <h2>Contact Us</h2>
            <div class="contact_details">
                <div class="contact_card">
                    <img src="<?= ROOT ?>/assets/images/medical/sample.jpg" alt="Contact">
                    <p>Whatsapp: 081234567890</p>   
                </div>
                <div class="contact_card">
                    <img src="<?= ROOT ?>/assets/images/medical/sample.jpg" alt="Email">
                    <p>Email: example@example.com</p>
                </div>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>

</body>
</html>