<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/findMedi.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/search_cont.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/pagination.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <!-- header -->
        <h1 class="medical-care-header-text">Medical Care Centers</h1>

        <!-- search bar -->
        <div class="search-container shelters">
            <form method="GET" action="<?= ROOT ?>/medical-centers" class="shelter-search-form">
                <div class="searchbox-container">
                    <div class="search-field">
                        <label for="location" class="search-label">Find Medical Providers by Location</label>
                        <select name="location" id="location" class="location-select">
                            <option value="all" <?= $pagination['location'] === 'all' ? 'selected' : '' ?>>Anywhere</option>
                            <?php foreach ($locations as $loc): ?>
                                <option value="<?= htmlspecialchars($loc->location) ?>" 
                                        <?= $pagination['location'] === $loc->location ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($loc->location) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="search-field">
                        <label for="medical_Name" class="search-label">Medical Provider Name</label>
                        <select name="medical_Name" id="medical_Name" class="location-select">
                            <option value="all" <?= $pagination['medical_Name'] === 'all' ? 'selected' : '' ?>>All Medical Providers</option>
                            <?php foreach ($medical_Names as $type): ?>
                                <option value="<?= htmlspecialchars($type->name) ?>" 
                                        <?= $pagination['medical_Name'] === $type->name ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($type->name) ?>
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
        
        <!-- card grid -->
        <div id="cardGrid" class="grid-container">
            <?php 
                if(!empty($medical_centers)) {
                    foreach($medical_centers as $center) {
                        if($center->verifiedStatus == 'approved') {
                        echo "
                        <div class='card'>
                            <a href='medical-centers/medical-center?id={$center->med_id}' class='link-medi'><img src='{$center->img}' alt='Center image' class='card-image'></a>
                            <div class='card-content'>
                                <a href='medical-centers/medical-center?id={$center->med_id}' class='link-medi'><h2 class='card-title'>{$center->name}</h2></a>
                                <p class='card-subtitle'>{$center->location}</p>
                                <a href='medical-centers/medical-center?id={$center->med_id}' class='link-medi'><button class='card-button' onclick='bookAppointment('{$center->med_id}')'>Show more</button></a>
                            </div>
                        </div>";
                        }
                    }
                } else {
                    echo "<p>No medical centers found.</p>";
                }
            ?>
        </div>

        <!-- Pagination -->
        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="pagination-container">
                <?php if ($pagination['current_page'] > 1): ?>
                    <a href="<?= ROOT ?>/medical-centers?page=<?= $pagination['current_page'] - 1 ?>&location=<?= $pagination['location'] ?>&medical_Name=<?= $pagination['medical_Name'] ?>" class="pagination-button">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <a href="<?= ROOT ?>/medical-centers?page=<?= $i ?>&location=<?= $pagination['location'] ?>&medical_Name=<?= $pagination['medical_Name'] ?>" 
                       class="pagination-button <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                    <a href="<?= ROOT ?>/medical-centers?page=<?= $pagination['current_page'] + 1 ?>&location=<?= $pagination['location'] ?>&medical_Name=<?= $pagination['medical_Name'] ?>" class="pagination-button">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
</body>
</html>