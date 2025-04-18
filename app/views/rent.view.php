<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/rent.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    
<?php include '../app/views/components/header.php'?>

<h1>Rent a Pet</h1>
    <form action="<?=ROOT?>/service/postpet/postpetnext/rent/submit" method="POST">
        
        <label for="rentalDuration">Rental Duration (days):</label>
        <input type="number" id="rentalDuration" name="rentalDuration" required>

        <label for="rentalFee">Rental Fee ($):</label>
        <input type="number" id="rentalFee" name="rentalFee" required>

        <label for="renterName">Renter Name:</label>
        <input type="text" id="renterName" name="renterName" required>

        <label for="renterContact">Renter Contact:</label>
        <input type="tel" id="renterContact" name="renterContact" required>

        <label for="renterAddress">Renter Address:</label>
        <input type="text" id="renterAddress" name="renterAddress" required>

        <label>
            <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
            I Agree to Terms and Conditions
        </label>

        <button type="submit">Submit</button>
    </form>
</body>
</html>