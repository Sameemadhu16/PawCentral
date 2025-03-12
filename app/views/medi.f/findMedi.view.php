<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/findMedi.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <!-- header -->
        <h1 class="medical-care-header-text">Medical Care Centers</h1>

        <!-- search bar -->
        <?php include("../app/views/components/models/search_bar.php"); ?>
        
        <!-- card grid -->
        <div id="cardGrid" class="grid-container">
            <?php 
                if(!empty($medical_centers)) {
                    foreach($medical_centers as $center) {
                        echo "
                        <div class='card'>
                            <a href='medical-centers/medical-center/{$center->med_id}' class='link-medi'><img src='{$center->img}' alt='Center image' class='card-image'></a>
                            <div class='card-content'>
                                <a href='<?= ROOT ?>/medical-centers/medical-center/{$center->med_id}' class='link-medi'><h2 class='card-title'>{$center->name}</h2></a>
                                <p class='card-subtitle'>{$center->location}</p>
                                <a href='<?= ROOT ?>/medical-appointment-date/{$center->med_id}' class='link-medi'><button class='card-button' onclick='bookAppointment('{$center->med_id}')'>Book appointment</button></a>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>No medical centers found.</p>";
                }
            ?>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
</body>
</html>