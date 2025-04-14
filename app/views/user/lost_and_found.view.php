<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/lostFound.css">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
    <div class="user-accounts-section">

    <?php if (!empty($pets)): ?>
        <div class="header-section">
            <h2>Your lost and found posts</h2>
            <button class="quick-action-button fixedsize" onclick="window.location.href='<?=ROOT?>/lostandfound/report-animal';">Report Pet</button>
        </div>
        
        <div class="cards-container">
            <!-- <div style="block"></div> -->
        <?php foreach ($pets as $pet): ?>
            <div class="pet-card" id=<?= htmlspecialchars($pet->petid); ?>>
                <div class="card-info">
                <img src=<?=htmlspecialchars($pet->img1)?> alt="nikkhy" class="pet-photo">
                <a class="pet-details" href="<?=ROOT?>/lostandfound/postdetails?id=<?= $pet->petid ?>">
                    <div class="details">
                        <h3><?= htmlspecialchars($pet->petName); ?> - <?= htmlspecialchars($pet->breed); ?></h3>
                        <p><?= htmlspecialchars($pet->status); ?></p>
                        <p><?= htmlspecialchars($pet->address); ?> - <?= htmlspecialchars($pet->location); ?></p>
                        <p class="date">Reported on: <?= htmlspecialchars($pet->publishedOn); ?></p>
                    </div>
                </a>
                </div>
                <div class="buttons">
                    <form action="<?= ROOT ?>/lostandfound/edit?id=<?= htmlspecialchars($pet->petid) ?>" method="POST" style="display: inline;">
                        <!-- <button class="action-button">Update info</button> -->
                        <button class="don-but">Update Info</button>
                    </form>
                    
                    <button class="don-but close-but" 
                                    onclick="showPopup(
                                        <?= htmlspecialchars($pet->petid) ?>,
                                        '<?= ROOT ?>/lostandfound/marklostnfound?id=<?= htmlspecialchars($pet->petid) ?>',
                                        'Are you sure want to close this post?<br><br><?= htmlspecialchars(addslashes($pet->petName != NULL ? $pet->petName : $pet->breed)) ?> - <?= htmlspecialchars(addslashes($pet->type)) ?>',
                                        ['Found the Owner', 'Give up', 'Found my Pet', 'Decided to Adopt', 'Passed away', 'Prefer not to say','Mistaken Entry']
                                    )">
                                    Close Request
                                </button>
                    <!-- <button class="action-button">Mark complete</button> -->
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">You have not reported any pets yet.<br>
                        <button class="add-event fixedsize"  onclick="openPopup()">Report a Pet</button></p><br>
                    </div>
    <?php endif; ?>
</div>


    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
    
    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>
</body>

</html>