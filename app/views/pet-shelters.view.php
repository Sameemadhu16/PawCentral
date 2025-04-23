<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/search_cont.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/pagination.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Shelters</h1>

    <div class="containers">
        <!-- Search Container -->
        <div class="search-container shelters">
    <form method="GET" action="<?= ROOT ?>/shelters" class="shelter-search-form">
        <div class="searchbox-container">
            <div class="search-field">
                <label for="location" class="search-label">Find Pet Shelters by Location</label>
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
            <?php if (!empty($shelters)): ?>
                <?php foreach ($shelters as $shelter): ?>
                    <div class="card">
                        <img src="<?= ROOT ?>/<?= htmlspecialchars($shelter->image) ?>" alt="<?= htmlspecialchars($shelter->name) ?>">
                        <p class="name"><?= htmlspecialchars($shelter->name) ?></p>
                        <div class="centre-info">
                            <p><?= htmlspecialchars($shelter->location) ?></p>
                            <!-- <p class="hours"><?= htmlspecialchars($shelter->operating_hours) ?></p> -->
                            <!-- <p>Contact: <?= htmlspecialchars($shelter->contact_no) ?></p> -->
                        </div>
                        <a href="<?= ROOT ?>/petshelters/details?id=<?= $shelter->id ?>" class="btn-appointment">See more</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No shelters found in this location.</p>
            <?php endif; ?>
        </div>

        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="pagination-container">
                <?php if ($pagination['current_page'] > 1): ?>
                    <a href="<?= ROOT ?>/shelters?page=<?= $pagination['current_page'] - 1 ?>&location=<?= $pagination['location'] ?>" class="pagination-button">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <a href="<?= ROOT ?>/shelters?page=<?= $i ?>&location=<?= $pagination['location'] ?>" 
                       class="pagination-button <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                    <a href="<?= ROOT ?>/shelters?page=<?= $pagination['current_page'] + 1 ?>&location=<?= $pagination['location'] ?>" class="pagination-button">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
</body>
</html>
