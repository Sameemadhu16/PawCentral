<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Medical Center</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/mediCenter.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <div class="hero">
            <div class="medimage">
                <img src="<?= ROOT . '/' . $medical_center->img ?>" alt="Medical Center">
            </div>
            <div class="medi_info">
                <div class="medi_name">
                    <h1><?= $medical_center->name ?></h1>
                    <p><?= $medical_center->location ?></p>
                </div>
                <div class="about">
                    <h2>About Us</h2>
                    <p><?= $medical_center->about_us ?></p>
                </div>
                <div class="appointment_btn">
                    <a href="<?=ROOT?>/medical-appointment-date?id=<?= $medical_center->med_id ?>">
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
                    $i = 1;
                    foreach($services as $service){
                        echo "
                            <div class='service_card card' style='--i: $i;'>
                                
                                <h3>$service->service_name</h3>
                            </div>
                        ";
                        $i++;
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
                    $i = 1;
                    foreach($veterinarians as $vet) {
                        echo "
                        <div class='vet_card card' style='--i: $i;'>
                            <div class='vet-image'>
                                <img src='$vet->img' alt='{$vet->name}'>
                            </div>
                            <div class='vet-details'>
                                <h3>{$vet->name}</h3>
                                <p><strong>Experience:</strong> {$vet->experience}</p>
                                <p><strong>Availability:</strong> {$vet->availability}</p>
                            </div>
                        </div>";
                        $i++;
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
                <div class="contact_card card" style="--i: 1;">
                    <img src="<?= ROOT ?>/assets/images/logos/whatsapp_icon.png" alt="Contact">
                    <p>Whatsapp: <?= $medical_center->contact_no ?></p>   
                </div>
                <div class="contact_card card" style="--i: 2;">
                    <img src="<?= ROOT ?>/assets/images/logos/gmail_icon.png" alt="Email">
                    <p>Email: <?= $medical_center->email ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>

    <script>
        

        // Add dynamic service icons using JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const serviceCards = document.querySelectorAll('.service_card');
            serviceCards.forEach(card => {
                const serviceName = card.querySelector('h3').textContent;
            });

            // Scroll animations
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.service_card, .vet_card, .contact_card, .services h2, .veterinarians h2, .contact-section h2');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight * 0.9) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Initial check
            animateOnScroll();
            
            // Listen for scroll events
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>
</html>