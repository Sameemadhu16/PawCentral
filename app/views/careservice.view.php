<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Pet Toy Service</title>
    <link rel="stylesheet" href="../assets/css/careservice.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="image_section">
                <img src="<?= ROOT ?>/assets/images/istockphoto-612739772-612x612.jpg" alt="Pet Toy Service Image">
            </div>
            <div class="info_section">
                <div class="service_name">
                    <h1>Pet Toy Service</h1>
                    <p>456 Toy Avenue, Kalutara, Sri Lanka</p>
                </div>
                <div class="about">
                    <h2>About Us</h2>
                    <p>Welcome to our Pet Toy Service! We specialize in crafting high-quality, engaging toys that bring joy and mental stimulation to pets of all sizes.</p>
                </div>
                <p>★★★☆☆</p>
                <div class="contact_button">
                    <a href="<?= ROOT ?>/contact">
                        <button>Contact Us</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="services">
            <h2>Our Toys and Features</h2>
            <div class="service_cards_collection">
                <div class="service_card">
                    <img src="<?= ROOT ?>/assets/images/images (4).jpg" alt="Interactive Puzzle Toys">
                    <h3>Interactive Puzzle Toys</h3>
                    <p>Keep your pets engaged with fun and challenging puzzle toys.</p>
                </div>
                <div class="service_card">
                    <img src="<?= ROOT ?>/assets/images/willie-bones-dog-chewing-toy-646e71a6edc54eda90b90c72250ff111.jpg" alt="Chew-Resistant Toys">
                    <h3>Chew-Resistant Toys</h3>
                    <p>Durable toys designed for even the toughest chewers.</p>
                </div>
                <div class="service_card">
                    <img src="<?= ROOT ?>/assets/images/Organic_Toys_for_Dogs.webp" alt="Eco-Friendly Options">
                    <h3>Eco-Friendly Options</h3>
                    <p>Sustainable toys made with biodegradable materials.</p>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="testimonials">
            <h2>What Our Customers Say</h2>
            <div class="testimonial_cards_collection">
                <div class="testimonial_card">
                    <p>"My dog absolutely loves the interactive puzzle toy. It's his favorite!"</p>
                    <h4>- John Doe</h4>
                </div>
                <div class="testimonial_card">
                    <p>"The chew-resistant toy lasted longer than any other I've bought."</p>
                    <h4>- Jane Smith</h4>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact">
            <h2>Get in Touch</h2>
            <div class="contact_details">
                <div class="contact_card">
                    <img src="<?= ROOT ?>/assets/images/contact/phone.png" alt="Phone">
                    <p>Phone: +94 123 456 789</p>
                </div>
                <div class="contact_card">
                    <img src="<?= ROOT ?>/assets/images/contact/email.png" alt="Email">
                    <p>Email: <a href="mailto:toys@petcareservice.com">toys@petcareservice.com</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>