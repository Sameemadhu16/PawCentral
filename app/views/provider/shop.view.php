<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Pet Toy Service</title>
    <link rel="stylesheet" href="<?=ROOT?> /assets/css/shop.css">
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
                <h1><?=($shopsDetails->name)?></h1>
                <p><?=($shopsDetails->Areas)?></p>
                </div>
                <p class="hours">
                                <?= ($shopsDetails->open_hour != "00:00:00" && $shopsDetails->closing_hour != "00:00:00") 
                                    ? date("gA", strtotime($shopsDetails->open_hour)) . " - " . date("gA", strtotime($shopsDetails->closing_hour)) 
                                    : "Mon-Fri: 8am - 6pm" ?>
                            </p>
                <div class="about">
                    <h2>About Us</h2>
                    <!-- <p>Welcome to our Pet Toy Service! We specialize in crafting high-quality, engaging toys that bring joy and mental stimulation to pets of all sizes.</p> -->
                </div>
                <p>★★★☆☆</p>
                <div class="contact_button">
    <button class="contact-btn">Contact Us</button>
    <p id="contactNumber" class="contact-number" style="display: none;">0<?=htmlspecialchars($userDetails->mobile_no)?></p>
</div>
            </div>
        </div>

        <!-- Services Section -->
        
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
        
                <a href="<?=ROOT?>/shop/edit?id=<?=htmlspecialchars($product->product_id)?>" class="btn edit-btn">Edit</a>
                <a href="<?=ROOT?>/shop/delete?id=<?=htmlspecialchars($product->product_id)?>"   class="btn edit-btn">Delete</a>
               
        
                </div>
              
            </div>
        </div>
        <?php endif ?>
        <?php endforeach; ?>
    </div>
</div>

        </div>
        <div class="create-post-section">
    <button class="create-post-btn" onclick="location.href='<?=ROOT?>/shop/postForm'">Create Post</button>
</div>
        <!-- Testimonials Section -->
      
        <!-- Contact Section -->
      
        <?php include("../app/views/components/footer.php")?>
        <div id="customConfirm" class="modal">
  <div class="modal-content">
    <p>Are you sure you want to delete this item?</p>
    <div class="modal-buttons">
      <button id="confirmYes" class="btn confirm">Yes</button>
      <button id="confirmNo" class="btn cancel">No</button>
    </div>
  </div>
</div>
<script>
    document.querySelectorAll('.edit-btn[href*="delete"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const deleteUrl = this.href;
            const modal = document.getElementById('customConfirm');
            modal.style.display = 'flex';

            document.getElementById('confirmYes').onclick = function () {
                modal.style.display = 'none';
                window.location.href = deleteUrl;
            };

            document.getElementById('confirmNo').onclick = function () {
                modal.style.display = 'none';
            };
        });
    });
    
    document.querySelector('.contact-btn').addEventListener('click', function() {
        const contactNumber = document.getElementById('contactNumber');
        // Toggle the visibility of the contact number
        if (contactNumber.style.display === 'none') {
            contactNumber.style.display = 'block';
        } else {
            contactNumber.style.display = 'none';
        }
    });

</script>
</body>

</html>