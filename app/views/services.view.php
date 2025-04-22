<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Services</h1>
  <div class="containers">
      <!-- Search Container -->
      <div class="search-container">
        <div class="searchbox">
            <label for="">Location</label>
        <select>
            <option>location</option>
            <option>Panadura</option>
            <option>asdsdadsasdasdsadgasod</option>
        </select>
        </div>
        
        <div class="searchbox">
            <label for="">Service type</label>
        <select>
            <option>all</option>
        </select>
        </div>
        <div class="searchbox">
            <label for="">Rating</label>
            <select>
                <option>any</option>
            </select>
        </div>
        <button>Search</button>
    </div>
    

    <!-- Results Container (Cards) -->
    <div class="results-container">
    <?php if (!empty($shopList)): ?>
        <?php foreach ($shopList as $shop): ?>
            <div class="card">
                <img src="<?= ROOT ?>/assets/images/pets/services/service_1.jpg" alt="Service Image">
                <p class="name"><?= htmlspecialchars($shop->name) ?></p>
                <?php
                echo "<pre>";
print_r($shop->user_id);
echo "</pre>";
?>
                <p><?= htmlspecialchars($shop->service_type ?? 'Service') ?></p>
                <div class="centre-info">
                    <span class="rating">★★★☆☆</span> <!-- Static rating placeholder -->
                    <p><?= htmlspecialchars($shop->Areas) ?></p>
                    <p class="hours">
                        <?= ($shop->open_hour != "00:00:00" && $shop->closing_hour != "00:00:00") 
                            ? date("gA", strtotime($shop->open_hour)) . " - " . date("gA", strtotime($shop->closing_hour)) 
                            : "Mon-Fri: 8am - 6pm" ?>
                    </p>
                </div>
                <button class="btn-appointment" onclick="location.href='<?= ROOT ?>/services/shop?id=<?=$shop->user_id?>'">See More</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">No services found.</p>
    <?php endif; ?>
</div>

  </div>
    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&lt;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&gt;</a>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>

</body>
</html>
