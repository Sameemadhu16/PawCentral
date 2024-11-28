
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/careservice.css">
    <title>Pet Toy Service Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/details.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>

    <main class="details-container">
        <h1 class="service-title">Pet Toy Service Details</h1>

        <div class="service-banner">
            <img src="<?= ROOT ?>/assets/images/pets/services/service_1.jpg" alt="Pet Toy Service">
        </div>

        <section class="about">
            <h2>About Us</h2>
            <p>Welcome to our Pet Toy service! We specialize in crafting and providing high-quality, safe, and engaging toys for pets of all sizes. Our mission is to keep your pets happy, active, and mentally stimulated.</p>
        </section>

        <section class="location">
            <h2>Location</h2>
            <p>456 Toy Avenue, Kalutara, Sri Lanka</p>
            
        </section>

        <section class="description">
            <h2>Description</h2>
            <p>We offer a wide variety of pet toys designed for fun and functionality. From chew toys to interactive puzzles, our products are made with pet-safe materials and tested for durability to ensure they stand up to the toughest playtimes.</p>
        </section>

        <section class="services">
            <h2>Our Toys and Features</h2>
            <ul>
                <li>Interactive Puzzle Toys</li>
                <li>Chew-Resistant Toys</li>
                <li>Plush Toys for Cuddling</li>
                <li>Rope Toys for Tugging</li>
                <li>Customizable Toy Bundles</li>
                <li>Eco-Friendly and Biodegradable Options</li>
            </ul>
        </section>

        <section class="contact">
            <h2>Contact Us</h2>
            <p>Email: <a href="mailto:toys@petcareservice.com">toys@petcareservice.com</a></p>
            <p>Phone: <a href="tel:+94123456789">+94 123 456 789</a></p>
            <p>Operating Hours: Mon-Fri, 9:00 AM - 5:00 PM</p>
        </section>

        <a href="<?= ROOT ?>" class="btn-back">Back to Services</a>
    </main>
</body>
</html>