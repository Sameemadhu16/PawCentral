<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/homepage.css">
    <!-- <link rel="stylesheet" href="./assets/css/homepage1.css">  CSS FOR STATS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/homevid.css">
    <title>Document</title>
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <!-- Hero section -->
    <section class="herov">
        <video class="herov-video" autoplay loop muted poster="<?=ROOT?>/assets/images/herobg.png">
          <source src="<?=ROOT?>/assets/videos/Pawsteps.mp4" type="video/mp4">
          <!-- <source src="path/to/your/video.webm" type="video/webm"> -->
        </video>
        <div class="herov-content">
          <h2 >CATS & DOGS</h2>
          <h3>CENTRALIZED CARE</h3>
          <p class="fontreg">Health, Wellness and Pet-Welfare. Find just the right amount of care for your pets.</p>
          <div class="hero-imgs">
            <!-- Include images of pets here -->
          </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats"> 
    <div class="stat-item" id="adopt-stat"> 
        <i class="fas fa-paw gradient-bgcolor"></i> 
        <h4 class="count fontreg extra gradient-bgcolor" data-target="100">0</h4> 
        <p>Waiting to be Adopted</p> 
        <a href="<?=ROOT?>/findapet">See pets</a> 
    </div> 
    <div class="stat-item" id="vets-stat"> 
        <i class="fas fa-user-md"></i> 
        <h4 class="count fontreg extra" data-target="50">0</h4>
        <p>Medical Professionals</p> 
        <a href="<?=ROOT?>/#">Visit Vets</a> 
    </div> 
    <div class="stat-item" id="shop-stat"> 
        <i class="fa fa-shopping-basket" aria-hidden="true"></i> 
        <h4 class="count fontreg extra" data-target="200">0</h4> 
        <p>Available for Buying</p> 
        <a href="<?=ROOT?>/findapet">See pets</a> 
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
                <h3>Find and Join Events</h3>
                <p>Discover events and communities near you and get involved.</p>
            </div>
        </div>
        <div class="interactive-card">
            <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
            <div class="card-display">
                <h3>Pet Products & Services</h3>
            </div>
            <div class="card-overlay">
                <h3>Pet Products & Services</h3>
                <p>Shop for high-quality pet products and services.</p>
            </div>
        </div>
    </section>


    
    <hr class="section-hr">

    <!--DOnation section  -->
<section class="donate-section">
<h1>
        Make a difference for animal lives
    </h1>
    <p>
        <span class="highlight"> Around 6 million dogs</span> <br> and <br> <span class="highlight">3 million stray dogs</span> <br>
        Equally large population of cats <br>
        Most of which <span class="highlight">suffers in malnutrition</span>, no proper care and <span class="highlight">needs rehoming.</span> <br>
    </p>
    <p>
        <span class="highlight">
            Contribute to a greater society where animals live as good a life as you are.
        </span>
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

    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>

<script>
    // Function to count up from 0 to the target value
    function countUp(element) {
    const target = +element.getAttribute('data-target'); // Get target number
    const speed = 100; // Speed of animation in milliseconds
    const increment = Math.ceil(target / speed); // Increment step
    let current = 0;

    const updateCount = () => {
        current += increment;
        if (current >= target) {
        element.innerText = `${target}+`; // Set final value with '+' appended
        } else {
        element.innerText = current;
        requestAnimationFrame(updateCount); // Recursively update
        }
    };

    updateCount();
    }

    // Intersection Observer to detect visibility in the viewport
    const stats = document.querySelectorAll('.count');
    const observer = new IntersectionObserver(
    (entries, observer) => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            const stat = entry.target;
            countUp(stat); // Start count-up animation
            observer.unobserve(stat); // Stop observing once animated
        }
        });
    },
    { threshold: 0.5 } // Trigger when 50% visible
    );

    // Observe each stat item
    stats.forEach(stat => observer.observe(stat));

</script>

</body>
</html>