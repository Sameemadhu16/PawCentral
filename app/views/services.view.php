<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/search_cont.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/pagination.css">

</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Services</h1>
    <div class="containers">
        <!-- Search Container -->
        <div class="search-container shelters">
            <form method="GET" action="<?= ROOT ?>/services" class="shelter-search-form">
                <div class="searchbox-container">
                    <div class="search-field">
                        <label for="location" class="search-label">Find Services by Location</label>
                        <select name="location" id="location" class="location-select">
                            <option value="all" <?= $pagination['location'] === 'all' ? 'selected' : '' ?>>Anywhere</option>
                            <?php foreach ($locations as $loc): ?>
                                <option value="<?= htmlspecialchars($loc->Areas) ?>" 
                                        <?= $pagination['location'] === $loc->Areas ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($loc->Areas) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="search-field">
                        <label for="service_type" class="search-label">Service Type</label>
                        <select name="service_type" id="service_type" class="location-select">
                            <option value="all" <?= $pagination['service_type'] === 'all' ? 'selected' : '' ?>>All Services</option>
                            <?php foreach ($service_types as $type): ?>
                                <option value="<?= htmlspecialchars($type->service_type) ?>" 
                                        <?= $pagination['service_type'] === $type->service_type ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($type->service_type) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="search-icon">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Results Container (Cards) -->
        <div class="results-container">
            <?php if (!empty($shopList)): ?>
                <?php foreach ($shopList as $shop): ?>
                    <div class="card">
                       <img src="<?= ROOT . '/' . ($shop->image ? $shop->image : 'assets/images/pets/services/service_1.jpg') ?>" alt="Service Image">
                        <p class="name"><?= htmlspecialchars($shop->Shop_name) ?></p>
                        <p><?= htmlspecialchars($shop->service_type ?? 'Service') ?></p>
                        <div class="centre-info">
                           
                            <p><?= htmlspecialchars($shop->Areas) ?></p>
                            <p class="hours">
                                <?= ($shop->open_hours != "00:00:00" && $shop->closing_hours != "00:00:00") 
                                    ? date("gA", strtotime($shop->open_hours)) . " - " . date("gA", strtotime($shop->closing_hours)) 
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

        <!-- Pagination -->
        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="pagination-container">
                <?php if ($pagination['current_page'] > 1): ?>
                    <a href="<?= ROOT ?>/services?page=<?= $pagination['current_page'] - 1 ?>&location=<?= $pagination['location'] ?>&service_type=<?= $pagination['service_type'] ?>" class="pagination-button">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <a href="<?= ROOT ?>/services?page=<?= $i ?>&location=<?= $pagination['location'] ?>&service_type=<?= $pagination['service_type'] ?>" 
                       class="pagination-button <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                    <a href="<?= ROOT ?>/services?page=<?= $pagination['current_page'] + 1 ?>&location=<?= $pagination['location'] ?>&service_type=<?= $pagination['service_type'] ?>" class="pagination-button">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>

</body>
</html>
