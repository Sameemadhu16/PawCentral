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
   
    <div class="form">
    <form id="postpetform" method="POST" action="<?=ROOT?>/service/manage/editpost/update" onsubmit="validateForm(event)">
    <!-- Hidden input field for ID -->
    <input type="hidden" name="id" value="<?=htmlspecialchars($post->id)?>">

    <!-- Other input fields -->
    <input type="text" name="petName" value="<?=htmlspecialchars($post->petName)?>" placeholder="Enter the pet's name:">
    <input type="text" name="species" value="<?=htmlspecialchars($post->species)?>" placeholder="ex:German Shepherd">
    <input type="text" name="breed" value="<?=htmlspecialchars($post->breed)?>" placeholder="Enter breed:">
    <input type="text" name="genderNeeds" value="<?=htmlspecialchars($post->genderNeeds)?>" placeholder="ex:Male/Female">
    <input type="text" name="contactName" value="<?=htmlspecialchars($post->contactName)?>" placeholder="Enter your name:">
    <input type="text" name="contactNumber" value="<?=htmlspecialchars($post->contactNumber)?>" placeholder="ex:-077 34 353">
    <input type="email" name="email" value="<?=htmlspecialchars($post->email)?>" placeholder="Enter the E-mail:">

    <!-- Additional fields for selling form -->
    <label class="pricel">Price:</label>
    <input type="text" name="price" value="<?=htmlspecialchars($post->price)?>" placeholder="0.00" class="price"><br><br><br>

    <label class="fee">Fee is negotiable</label>
    <input class="feebox" name="feebox" type="checkbox" <?= $post->feebox ? 'checked' : '' ?>><br>

    <h3 class="location">Location Details:</h3>
    <label class="cityl">City:</label>
    <input type="text" name="city" value="<?=htmlspecialchars($post->city)?>" class="city"><br><br>

    <label class="addressl">Exact<br>Address:</label>
    <input type="text" name="address" value="<?=htmlspecialchars($post->address)?>" class="address"><br><br><br>

    <button type="submit" class="button">NEXT</button>
</form>
    </div>