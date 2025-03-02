<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Pet</title>
    <link rel="stylesheet" href="../assets/css/postpet.css">
    <script src="../assets/js/postpet/postpet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>

    <div class="title">
        <h2>Post Pet</h2>
        <hr/>
    </div>

    <div class="form">
        <form id="postpetform" method="POST" action="<?=ROOT?>/service/postpet/submit" onsubmit="validateForm(event)">
            
            <!-- Hidden Fields -->
            <input type="hidden" name="pet_id">
            <input type="hidden" name="merchant_id">
            <input type="hidden" name="merchant_ref_id">

            <!-- Trade Type -->
            <h3>Trade Type</h3>
<select name="tradeType" required>
    <option value="">Select</option>
    <option value="Selling">Selling</option>
    <option value="Renting">Renting</option>
    <option value="Importing">Importing</option>
</select>

            <!-- Pet Name -->
            <h3>Pet's Name</h3>
            <input type="text" name="petName" placeholder="Enter the pet's name" required>

            <!-- Species & Breed -->
            <h3>Species</h3>
            <input type="text" name="species" placeholder="ex: German Shepherd" required>

            <h3>Breed</h3>
            <input type="text" name="breed" placeholder="Enter breed" required>

            <!-- Sex -->
            <h3>Sex</h3>
            <select name="sex" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <!-- Age, Height, Weight -->
            <h3>Age (in years)</h3>
            <input type="number" name="age" placeholder="Enter age" min="0" required>

            <h3>Height (cm)</h3>
            <input type="number" name="height" placeholder="Enter height in cm" min="0" required>

            <h3>Weight (kg)</h3>
            <input type="number" name="weight" placeholder="Enter weight in kg" min="0" required>

            <!-- Special Needs -->
            <h3>Special Needs</h3>
            <input  type="text" name="genderNeeds" placeholder="ex:medications" class="box">
            <h3>Contact Name:</h3>
            <input type="text" name="contactName" placeholder="Enter your name:">
            <h3>Contact Number</h3>
            <input type="text" name="contactNumber" placeholder="ex: 077 34 353" required>

            <h3>Email</h3>
            <input type="email" name="email" placeholder="Enter your email" required>

            <!-- Submit Button -->
            <button type="submit" class="button">NEXT</button>
        </form>
    </div>
</body>
</html>
