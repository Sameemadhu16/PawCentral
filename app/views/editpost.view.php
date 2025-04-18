<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../../assets/css/edit__post.css">
    <script src="../assets/js/postpet/postpet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>
    <div class="title">
        <h2>Edit Post </h2>
        <hr/>
    </div>
    <?php
    echo "pre";
    print_r($data);
    print_r($data['post']->importing_owner);
    echo "</pre>"
    ?>
    <div class="form">
    <form id="postpetform" method="POST" action="<?=ROOT?>/service/manage/editpost/update" onsubmit="validateForm(event)">
   
    <input type="hidden" name="id" value="<?=htmlspecialchars($data['post']->pet_id)?>">
    <input type="hidden" name="tradeType" value="<?=htmlspecialchars($data['post']->tradeType)?>">
   
            <h3>Pet's Name</h3>
            <input type="text" name="petName" placeholder="Enter the pet's name" required value="<?=htmlspecialchars($data['post']->pet_name)?>">

            <!-- Species & Breed -->
            <h3>Species</h3>
            <input type="text" name="species" placeholder="ex: Dog, Cat" required value="<?=htmlspecialchars($data['post']->species)?>">

            <h3>Breed</h3>
            <input type="text" name="breed" placeholder="ex: German Shepherd" required value="<?=htmlspecialchars($data['post']->breed)?>">

            <!-- Sex -->
            <h3>Sex</h3>
            <select name="sex" required>
                <option value="">Select</option>
                <option value="Male" <?=$data['post']->sex==='Male' ? 'selected' :''?>>Male</option>
                <option value="Female"<?=$data['post']->sex==='Female' ? 'selected' :''?>>Female</option>
            </select>

            <!-- Age, Height, Weight -->
            <h3>Age (in years)</h3>
            <input type="number" name="age" placeholder="Enter age" min="0" required value='<?=htmlspecialchars($data['post']->age)?>'>

            <h3>Height (cm)</h3>
            <input type="number" name="height" placeholder="Enter height in cm" min="0" required value='<?=htmlspecialchars($data['post']->height)?>'>

            <h3>Weight (kg)</h3>
            <input type="number" name="weight" placeholder="Enter weight in kg" min="0" required value="<?=htmlspecialchars($data['post']->weight)?>">

            <!-- Health Information -->
            <h3>Neutered/Spayed?</h3>
            <select name="neutered" required>
                <option value="">Select</option>
                <option value="Yes" <?=$data['post']->neutered=='Yes' ? 'selected' : ''?>>Yes</option>
                <option value="No"<?=$data['post']->neutered=='No' ? 'selected' : ''?>>No</option>
            </select>

            <h3>Trained?</h3>
            <select name="trained" required>
                <option value="">Select</option>
                <option value="Yes"<?=$data['post']->trained=='Yes' ? 'selected' : ''?>>Yes</option>
                <option value="No"<?=$data['post']->trained=='No' ? 'selected' : ''?>>No</option>
            </select>

            <h3>Pedigree?</h3>
            <select name="pedigree" required>
                <option value="">Select</option>
                <option value="Yes"<?=$data['post']->pedigree=='Yes' ? 'selected' : ''?>>Yes</option>
                <option value="No"<?=$data['post']->pedigree=='No' ? 'selected' : ''?>>No</option>
            </select>

            <h3>Vaccinated?</h3>
            <select name="vaccinated" required>
                <option value="">Select</option>
                <option value="Yes"<?=$data['post']->vaccinated=='Yes' ? 'selected' : ''?>>Yes</option>
                <option value="No"<?=$data['post']->vaccinated=='No' ? 'selected' : ''?>>No</option>
            </select>

            <!-- Contact Information -->
            <h3>Contact Name</h3>
            <input type="text" name="contactName" placeholder="Enter your name" required  value='<?=htmlspecialchars($data['post']->contactName)?>'>

            <h3>Contact Number</h3>
            <input type="text" name="contactNumber" placeholder="ex: 077 34 353" required value='<?=htmlspecialchars($data['post']->contactNumber)?>'>

            <h3>Email</h3>
            <input type="email" name="email" placeholder="Enter your email" required value='<?=htmlspecialchars($data['post']->email)?>'>

 
    <?php if ($data['post']->tradeType==='Selling'):?>
        <label class="pricel">Price:</label> 
        <input type="text" name="price" value='<?=htmlspecialchars($data['post']->price)?>' placeholder="0.00" class="price"><br><br><br>

        <label class="fee">Fee is negotiable</label>
        <input class="feebox" name="feebox" type="checkbox" <?= $data['post']->fee_negotiable ? 'checked' : '' ?>><br>

        <h3 class="location">Location Details:</h3>
        <label class="cityl">City:</label>
        <input type="text" name="city" value="<?=htmlspecialchars($data['post']->City)?>" class="city"><br><br>

        <label class="addressl">Exact<br>Address:</label>
        <input type="text" name="address" value="<?=htmlspecialchars($data['post']->Exact_address)?>" class="address"><br><br><br>
        <button type="submit" class="button">NEXT</button>
    <?php elseif($data['post']->tradeType==='Renting'):?>
        <label class="rental_fee">Rental fees:</label> 
        <input type="text" name="price" value='<?=htmlspecialchars($data['post']->rental_fee)?>' placeholder="0.00" class="price"><br><br><br>

        <label class="rental_duration">Rental Duration:</label>
        <input class="rental_duration" name="rental_duration" type="text" <?= $data['post']->rental_duration ?>><br>

        
        <label class="renter_contact">Renter Contact:</label>
        <input type="text" name="renter_contact" value="<?=htmlspecialchars($data['post']->renter_contact)?>" class="city"><br><br>

        <label class="renter_address">Renter Address:</label>
        <input type="text" name="address" value="<?=htmlspecialchars($data['post']->renter_address)?>" class="Exact_address"><br><br><br>
    <button type="submit" class="button">NEXT</button>
    <?php elseif($data['post']->tradeType==='Importing'):?>
        <label class="import_fees">Import fees:</label> 
        <input type="text" name="price" value='<?=htmlspecialchars($data['post']->import_fees)?>' placeholder="0.00" class="import_fees"><br><br><br>

        <label class="importing_owner">Importing Owner:</label>
        <input class="importing_owner" name="importing_owner" type="text" value='<?=htmlspecialchars($data['post']->importing_owner)?>'><br>

        
        <label class="importer_mobile">Importer Mobile:</label>
        <input type="text" name="importer_mobile" value="<?=htmlspecialchars($data['post']->importer_mobile)?>" class="importer_mobile"><br><br>

        <label class="country">Country:</label>
        <input type="text" name="country" value="<?=htmlspecialchars($data['post']->country)?>" class="country"><br><br>

        
        <label for="transport">Transport Method:</label>
        <select id="transport" name="transport">
                <option value="">Select</option>
                <option value="air"<?=$data['post']->transport_method=='air' ? 'selected' : ''?>>Air</option>
                <option value="sea"<?=$data['post']->transport_method=='sea' ? 'selected' : ''?>>Sea</option>
                <option value="land"<?=$data['post']->transport_method=='land' ? 'selected' : ''?>>Land</option>
            </select>

    <button type="submit" class="button">NEXT</button>
    <?php endif?>

</form>
    </div>