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
             <?php foreach ($announcements as $announcement): ?>
                <div class="announcement">
                    <h2> <?=$announcement->title?></h2>
                    <div class="meta">Date: <?=date('Y-m-d', strtotime($announcement->created_at))?> | Time: <?=date('H:i:s', strtotime($announcement->created_at))?></div>
                    <p style="padding:5px"><?= esc($announcement->content)?></p>
                </div>
                <?php endforeach; ?>
        </div>
    </div>

    <!-- FOOTER -->
<?php include("../app/views/components/footer.php")?>
</body>
</html>