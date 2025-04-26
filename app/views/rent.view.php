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
            
            <form class="rental-form" action="<?=ROOT?>/service/postpet/postpetnext/rent/submit" method="POST" onsubmit="return validateRentForm()">
    <div class="form-group">
        <label for="rentalDuration">Rental Duration (days):</label>
        <input type="number" id="rentalDuration" name="rentalDuration" min="1" required>
    </div>
    
    <div class="form-group">
        <label for="rentalFee">Rental Fee (Rs):</label>
        <input type="number" id="rentalFee" name="rentalFee" min="100" step="0.01" required>
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
    <script>
  function validateRentForm() {
    const duration = parseInt(document.getElementById('rentalDuration').value);
    const fee = parseFloat(document.getElementById('rentalFee').value);
    const termsChecked = document.getElementById('agreeTerms').checked;

    if (isNaN(duration) || duration < 1) {
      alert("Rental duration must be at least 1 day.");
      return false;
    }

    if (isNaN(fee) || fee < 100) {
      alert("Rental fee must be at least Rs. 100.");
      return false;
    }

    if (!termsChecked) {
      alert("You must agree to the terms and conditions.");
      return false;
    }

    return true;
  }
</script>
</body>
</html>