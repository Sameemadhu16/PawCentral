<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/import.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php include '../app/views/components/header.php'?>
<h1>Import a Pet</h1>
    <form action="<?=ROOT?>/service/postpet/postpetnext/import/submit" method="POST">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>
        
        <label for="owner">Importing Owner:</label>
        <input type="text" id="owner" name="owner" required>
        
        <label for="transport">Transport Method:</label>
        <select id="transport" name="transport">
            <option value="air">Air</option>
            <option value="sea">Sea</option>
            <option value="land">Land</option>
        </select>
        
        <label for="mobile">Importer’s Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required>
        
        <label for="fees">Import Fees:</label>
        <input type="number" id="fees" name="fees" required>
        
        <label>
            <input type="checkbox" id="terms" name="terms" required>
            I Agree to Terms and Conditions
        </label>
        
        <button type="button" onclick="alert('Review Terms')">Review Terms</button>
        <button type="button" onclick="alert('Please confirm all details')">Review</button>
        <button type="submit">Submit</button>
    </form>
</body>
</html>