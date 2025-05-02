<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Pets</title>
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/lostandfound.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/pagination.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php");?>

    <div class="pets-container">
        <div class="lostandfound-sec">
            <h1 class="heading">Lost & Found Pets</h1>
            <div class="filter-buttons">
                <div class="filters">
                    <button onclick="window.location.href='<?= ROOT ?>/lostandfound?status=all'" class="filter-btn <?= $pagination['status'] === 'all' ? 'active' : '' ?>">All</button>
                    <button onclick="window.location.href='<?= ROOT ?>/lostandfound?status=Lost'" class="filter-btn <?= $pagination['status'] === 'Lost' ? 'active' : '' ?>">Lost</button>
                    <button onclick="window.location.href='<?= ROOT ?>/lostandfound?status=Found'" class="filter-btn <?= $pagination['status'] === 'Found' ? 'active' : '' ?>">Found</button>
                </div>
            </div>

            <div class="pet-list">
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $pet): ?>
                        <a href="<?= ROOT ?>/lostandfound/postdetails?id=<?= htmlspecialchars($pet->petid) ?>" class="pet-card pet-card-link">
                            <img src="<?= htmlspecialchars($pet->img1) ?>" alt="<?= htmlspecialchars($pet->petName) ?>" class="pet-image">
                            <div class="pet-info">
                                <h2><?= htmlspecialchars($pet->petName) ?> - <?= htmlspecialchars($pet->breed) ?></h2>
                                <p><strong><?= htmlspecialchars($pet->status) ?></strong></p>
                                <?php if ($pet->reward != 0 or $pet->reward != null): ?>
                                    <span class="glimmer-button">Reward</span>
                                <?php endif; ?>
                                <p><?= htmlspecialchars($pet->address) ?></p>
                                <p>Reported on: <?= htmlspecialchars(date('d M Y', strtotime($pet->publishedOn))) ?></p>
                            </div>
                            </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No pets found.</p>
                <?php endif; ?>
            </div>

          
        </div>
        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="pagination-container">
                <?php if ($pagination['current_page'] > 1): ?>
                    <a href="<?= ROOT ?>/lostandfound?page=<?= $pagination['current_page'] - 1 ?>&status=<?= $pagination['status'] ?>" class="pagination-button">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <a href="<?= ROOT ?>/lostandfound?page=<?= $i ?>&status=<?= $pagination['status'] ?>" 
                       class="pagination-button <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                    <a href="<?= ROOT ?>/lostandfound?page=<?= $pagination['current_page'] + 1 ?>&status=<?= $pagination['status'] ?>" class="pagination-button">Next</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
    
    <!-- <script src="<?= ROOT?>/assets/js/lostandfound.js"></script> -->

</body>
</html>