<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Pet Toy Service</title>
    <link rel="stylesheet" href="<?=ROOT?> /assets/css/shop.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); 
   
    ?>

    <div class="container">
  
        <!-- Hero Section -->
        <div class="hero">
            <div class="image_section">
                <img src="<?= ROOT ?>/assets/images/istockphoto-612739772-612x612.jpg" alt="Pet Toy Service Image">
            </div>
            <?php
            // show($details);
            ?>
            <div class="info_section">
                <div class="service_name">
                    <h1><?=($shopsDetails->name)?></h1>
                    <p><?=($shopsDetails->Areas)?></p>
                </div>
                <div class="about">
                    <h2>About Us</h2>
                    <!-- <p>Welcome to our Pet Toy Service! We specialize in crafting high-quality, engaging toys that bring joy and mental stimulation to pets of all sizes.</p> -->
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
        
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != $shop_id): ?>
    <div class="inquiry-section">
        <button class="inquiry-btn" onclick="location.href='<?=ROOT?>/services/inquire?id=<?=$shop_id?>'">Write an Inquiry</button>
    </div>
<?php endif ?>
    <h2>Our Products</h2>
    <div class="product-grid">
        <?php foreach ($ProductPosts as $product): ?>
        <?php if($product->delete_status!=1):?>
        <div class="product-card">
            <div class="product-image">
                <?php if (!empty($product->img)): ?>
                    <img src="<?= ROOT ?>/<?= htmlspecialchars($product->img) ?>" alt="<?= htmlspecialchars($product->product_name) ?>">
                <?php else: ?>
                    <div class="no-image">No Image Available</div>
                <?php endif; ?>
            </div>
            <div class="product-details">
                <h3><?= htmlspecialchars($product->product_name) ?></h3>
                <p class="description"><?= htmlspecialchars(substr($product->description, 0, 100)) ?><?= strlen($product->description) > 100 ? '...' : '' ?></p>
                <p class="price">Rs:<?= number_format($product->price, 2) ?></p>
                <p class="stock">In Stock: <?= htmlspecialchars($product->stock_quantity) ?></p>
                <div class='post-actions'>
                </div>
              
            </div>
        </div>
        <?php endif ?>
        <?php endforeach; ?>
    </div>
</div>

        </div>

        <!-- Testimonials Section -->
       

        <!-- Contact Section -->
       
    </div>
    <?php include("../app/views/components/footer.php")?>
</body>
</html>