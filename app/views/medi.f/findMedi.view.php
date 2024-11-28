<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/findMedi.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">

        <!-- header -->
        <h1>Medical Care Centers</h1>

        <!-- search bar -->
        <div class="search-container">
            <form action="#" method="POST">
                <div class="search-field">
                    <label for="namesearch">Center name</label>
                    <input type="text" name="name_search" placeholder="">
                </div>
                <div class="search-field">
                    <label for="locationsearch">Location</label>
                    <input type="text" name="location_search" placeholder="">
                </div>
                <div class="search-submit">
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
        
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