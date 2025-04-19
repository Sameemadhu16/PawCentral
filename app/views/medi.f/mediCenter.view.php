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
                <img src="<?= ROOT . '/' . $medical_center->img ?>" alt="Medical Image">
            </div>
            <div class="medi_info">
                <div class="medi_name">
                    <h1><?= $medical_center->name ?></h1>
                    <p><?= $medical_center->location ?></p>
                </div>
                <div class="about">
                    <h2>About Us:</h3>
                    <p><?= $medical_center->about_us ?></p>
                </div>
                <div class="appointment_btn">
                    <a href="<?=ROOT?>/medical-appointment-date/<?= $medical_center->med_id ?>">
                        <button>Book Appointment</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="services">
            <h2>Our Services</h2>
            <div class="service_cards_collection cards-collection">
                <?php
                if(!empty($services)){
                    foreach($services as $service){
                        echo "
                            <div class='service_card card'>
                                <h3>$service->service_name</h3>
                            </div>
                        ";
                    }
                }else{
                    echo "<p>No services found.</p>";
                }
                ?>
            </div>
        </div>
        <div class="veterinarians">
            <h2>Our Veterinarians</h2>
            <div class="vet_cards_collection cards-collection">  
            <?php 
                if(!empty($veterinarians)) {
                    foreach($veterinarians as $vet) {
                        echo "
                        <div class='vet_card card'>
                            <div class='vet-image'>
                                <img src='$vet->img' alt='{$vet->name}'>
                            </div>
                            <div class='vet-details'>
                                <h3>{$vet->name}</h3>
                                <p><strong>Experience:</strong> {$vet->experience}</p>
                                <p><strong>Availability:</strong> {$vet->availability}</p>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>No veterinarians found.</p>";
                }
            ?>
            </div>
        </div>
        
        <div class="contact-section">
            <h2>Contact Us</h2>
            <div class="contact_details cards-collection">
                <div class="contact_card card">
                    <img src="<?= ROOT ?>/assets/images/logos/whatsapp_icon.png" alt="Contact">
                    <p>Whatsapp: <?= $medical_center->contact_no ?></p>   
                </div>
                <div class="contact_card card">
                    <img src="<?= ROOT ?>/assets/images/logos/gmail_icon.png" alt="Email">
                    <p>Email: <?= $medical_center->email ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>

</body>
</html>