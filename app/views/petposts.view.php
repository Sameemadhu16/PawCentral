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

    <h1 class="heading">Find a Pet</h1>

  <div class="containers">
      <!-- Search Container -->
      <div class="search-container shelters">
            <form method="GET" action="<?= ROOT ?>/findapet" class="shelter-search-form">
                <div class="searchbox-container">
                    <div class="search-field">
                        <label for="post_type" class="search-label">Post Type</label>
                        <select name="post_type" id="post_type" class="location-select">
                            <option value="all" <?= $pagination['post_type'] === 'all' ? 'selected' : '' ?>>All Posts</option>
                            <option value="rent" <?= $pagination['post_type'] === 'rent' ? 'selected' : '' ?>>Rent</option>
                            <option value="sell" <?= $pagination['post_type'] === 'sell' ? 'selected' : '' ?>>Sell</option>
                            <option value="adopt" <?= $pagination['post_type'] === 'adopt' ? 'selected' : '' ?>>Adopt</option>
                            <option value="import" <?= $pagination['post_type'] === 'import' ? 'selected' : '' ?>>Import</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label for="location" class="search-label">Location</label>
                        <select name="location" id="location" class="location-select">
                            <option value="all" <?= $pagination['location'] === 'all' ? 'selected' : '' ?>>All Locations</option>
                            <?php if (isset($locations) && !empty($locations)): ?>
                                <?php foreach ($locations as $loc): ?>
                                    <option value="<?= htmlspecialchars($loc) ?>" 
                                            <?= $pagination['location'] === $loc ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($loc) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="search-icon">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Filter
                    </button>
                </div>
            </form>
        </div>
        
    <!-- Results Container (Cards) -->
    <div class="results-container">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <a href="<?= ROOT ?>/findapet/<?= $post->pet_id ?>" class="card">
                    <span class="corner-label <?= $post->post_type ?>">
                        <?= ucfirst($post->post_type === 'adoption' ? 'adopt' : $post->post_type) ?>
                    </span>
                    <?php if ($post->post_type === 'adoption'): ?>
                        <img src="<?= $post->adopt_img ?>" alt="<?= htmlspecialchars($post->petName) ?>">
                    <?php else: ?>
                        <img src="<?= $post->img ?>" alt="<?= htmlspecialchars($post->petName) ?>">
                    <?php endif; ?>
                    <p class="name"><?= htmlspecialchars($post->petName) ?> - <?= htmlspecialchars($post->breed) ?></p>
                    <p><?= htmlspecialchars($post->location) ?></p>
                    <?php if ($post->post_type === 'adoption'): ?>
                        <span class="price">by <?= htmlspecialchars($post->shelter_name) ?></span>
                    <?php else: ?>
                        <span class="price">Rs. <?= number_format($post->price, 0, '.', ' ') ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-results">No pets found matching your criteria.</p>
        <?php endif; ?>
    </div>
  
    <!-- Pagination -->
    <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
        <div class="pagination-container">
            <?php if ($pagination['current_page'] > 1): ?>
                <a href="<?= ROOT ?>/findapet?page=<?= $pagination['current_page'] - 1 ?>&post_type=<?= $pagination['post_type'] ?>&location=<?= $pagination['location'] ?>" class="pagination-button">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                <a href="<?= ROOT ?>/findapet?page=<?= $i ?>&post_type=<?= $pagination['post_type'] ?>&location=<?= $pagination['location'] ?>" 
                   class="pagination-button <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                <a href="<?= ROOT ?>/findapet?page=<?= $pagination['current_page'] + 1 ?>&post_type=<?= $pagination['post_type'] ?>&location=<?= $pagination['location'] ?>" class="pagination-button">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>

</body>
</html>
