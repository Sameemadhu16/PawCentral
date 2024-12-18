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
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>
            <!-- example card -->
            <div class="card">
                <a href="<?=ROOT?>/medical-center" class="link-medi"><img src="<?= ROOT ?>/assets/images/shop.png" alt="Center name" class="card-image"></a>
                <div class="card-content">
                    <a href="<?=ROOT?>/medical-center" class="link-medi"><h2 class="card-title">Center name</h2></a>
                    <p class="card-subtitle">Location</p>
                    <a href="<?=ROOT?>/medical-appointment-date" class="link-medi"><button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button></a>
                </div>
            </div>




        </div>
        
        


    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
</body>
</html>