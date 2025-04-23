<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Pet</title>
    <link rel="stylesheet" href="../../../assets/css/rent.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'?>
    
    <div class="main-container">
        <!-- Left Side: Form -->
        <div class="form-container">
            <div class="form-header">
                <h1>Rent a Pet</h1>
                
            </div>
            
            <form class="rental-form" action="<?=ROOT?>/service/postpet/postpetnext/rent/submit" method="POST">
                <div class="form-group">
                    <label for="rentalDuration">Rental Duration (days):</label>
                    <input type="number" id="rentalDuration" name="rentalDuration" required>
                </div>
                
                <div class="form-group">
                    <label for="rentalFee">Rental Fee (Rs):</label>
                    <input type="number" id="rentalFee" name="rentalFee" required>
                </div>
                
                <div class="form-group">
                    <label for="renterName">Renter Name:</label>
                    <input type="text" id="renterName" name="renterName" required>
                </div>
                
                <div class="form-group">
                    <label for="renterContact">Renter Contact:</label>
                    <input type="tel" id="renterContact" name="renterContact" required>
                </div>
                
                <div class="form-group">
                    <label for="renterAddress">Renter Address:</label>
                    <input type="text" id="renterAddress" name="renterAddress" required>
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
                    <label for="agreeTerms">I agree to terms and conditions</label>
                </div>
                
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        
        <!-- Right Side: Full Image -->
        <div class="image-container">
            <img src="../../../assets/images/pexels-chevanon-1108099.jpg" alt="Happy Pet for Rent">
        </div>
    </div>
    
    <?php include("../app/views/components/footer.php")?>
</body>
</html>