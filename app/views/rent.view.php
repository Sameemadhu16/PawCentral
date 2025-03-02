<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php include '../app/views/components/header.php'?>

<h1>Rent a Pet</h1>
    <form action="<?=ROOT?>/service/postpet/postpetnext/renting/submit" method="POST">
        
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