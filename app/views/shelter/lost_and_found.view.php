<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/lostFound.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>
        <div class="content">
            <h2>Lost or Found pets</h2>
            <div class="pets-container">

                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p>Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <button class="action-button">Mark complete</button>
                </div>


                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p>Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <button class="action-button">Mark complete</button>
                </div>

                <div class="pet-card">
                    <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Nikkey" class="pet-photo">
                    <div class="pet-details">
                        <div class="details">
                            <h3>Nikkey - Pomeranian</h3>
                            <p>Found</p>
                            <p>36/2 Sri lankarama rd - Panadura</p>
                            <p>Reported: 2024/05/16</p>
                        </div>
                    </div>
                    <button class="action-button">Mark complete</button>
                </div>
            </div>
        </div>

    </div>
</body>

</html>