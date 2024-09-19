<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/homepage.css">
    <!-- <link rel="stylesheet" href="./assets/css/homepage1.css">  CSS FOR STATS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <!-- Hero section -->
    <section class="hero">
        <h2>CATS & DOGS</h2>
        <h3>CENTRALIZED CARE</h3>
        <p>Health, Wellness and Pet-Welfare.Find just the right amount of care for your pets.</p>
        <div class="hero-imgs">
            <!-- Include images of pets here -->
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-item">
            <i class="fas fa-paw"></i>
            <h4>100+</h4>
            <p>pets awaiting to be adopted</p>
            <a href="#see-pets">See pets</a>
        </div>
        <div class="stat-item">
            <i class="fas fa-user-md"></i>
            <h4>50+</h4>
            <p>medical professionals</p>
            <a href="#visit-vets">Visit Vets</a>
        </div>
        <div class="stat-item">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <h4>200+</h4>
            <p>available for buying</p>
            <a href="#shop">See pets</a>
        </div>
    </section>

    <hr class="section-hr">

    <!-- Interactive Sections -->
    <section class="interactive-sections">
        <div class="interactive-card">
            <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Events">
            <div class="card-display">
                <h3>Find and Join Events</h3>
            </div>
            <div class="card-overlay">
                <h4>Find and Join Events</h4>
                <p>Discover events and communities near you and get involved.</p>
            </div>
        </div>
        <div class="interactive-card">
            <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
            <div class="card-display">
                <h3>Pet Products & Services</h3>
            </div>
            <div class="card-overlay">
                <h4>Pet Products & Services</h4>
                <p>Shop for high-quality pet products and services.</p>
            </div>
        </div>
    </section>


    
    <hr class="section-hr">

    <!--DOnation section  -->
<section class="donate-section">
<h1>
        How you can make a difference to the betterment of the animal life
    </h1>
    <p>
        Around 6 million dogs and 3 million stray dogs <br>
        Equally large population of cats that needs human attention <br>
        Most of which suffers in malnutrition, no proper care and needs rehoming <br>
        Contribute to a greater society where animals live as good a life as you are.
    </p>
<section class="community-help-section">
    <div class="donation-overlay">
        <h1>Help the community in need</h1>
        <div class="donate-icon">
            <img src="<?= ROOT ?>/assets/images/donate.png" alt="Donation Icon">
        </div>
    </div>
</section>
</section>



</body>
</html>