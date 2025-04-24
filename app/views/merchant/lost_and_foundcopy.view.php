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
        <?php include("../app/views/components/merchant/sidebar.php"); ?>
            
            <div class="user-accounts-section">
            <div class="topicnbuttons">
                <h2>Your lost and found posts</h2> 
                <button class="action-button">Add another post</button>
            </div>
                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p class="date">Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="action-button">Update info</button>
                        <button class="action-button">Mark complete</button>
                    </div>
                </div>


                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p class="date">Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="action-button">Update info</button>
                        <button class="action-button">Mark complete</button>
                    </div>
                </div>

                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p class="date">Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="action-button">Update info</button>
                        <button class="action-button">Mark complete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>