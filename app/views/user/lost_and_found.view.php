<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/lostFound.css">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
            
        <div class="user-accounts-section">
    <div class="topicnbuttons">
        <button class="action-button fixedsize">Add another post</button>
    </div>
    <div class="topicnbuttons">
        <h2>Your lost and found posts</h2> 
    </div>

    <?php if (!empty($pets)): ?>
        <?php foreach ($pets as $pet): ?>
            <div class="pet-card" id=<?= htmlspecialchars($pet->id); ?>>
                <img src=<?=htmlspecialchars($pet->img1)?> alt="nikkhy" class="pet-photo">
                <a class="pet-details" href="<?=ROOT?>/home">
                    <div class="details">
                        <h3><?= htmlspecialchars($pet->petName); ?> - <?= htmlspecialchars($pet->breed); ?></h3>
                        <p><?= htmlspecialchars($pet->status); ?></p>
                        <p><?= htmlspecialchars($pet->address); ?> - <?= htmlspecialchars($pet->location); ?></p>
                        <p class="date">Reported on: <?= htmlspecialchars($pet->publishedOn); ?></p>
                    </div>
                </a>
                <div class="buttons">
                    <button class="action-button">Update info</button>
                    <button class="action-button">Mark complete</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No pets found.</p>
    <?php endif; ?>
</div>


    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>