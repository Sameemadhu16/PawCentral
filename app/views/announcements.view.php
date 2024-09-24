<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's Mew in Pet World</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/announcements.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pagination.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">What's Mew in Pet World!</h1>
    <div class="announcement-sec">
        <div id="announcements">
            <!-- Announcements will be inserted here by PHP -->
        </div>
    </div>
    <div class="pagination">
        <button id="prevPage" onclick="changePage(-1)">Previous</button>
        <span id="currentPage" class="current-page">1</span>
        <button id="nextPage" onclick="changePage(1)">Next</button>
    </div>
    <script src="<?= ROOT?>/assets/js/announcements.js"></script>
</body>
</html>