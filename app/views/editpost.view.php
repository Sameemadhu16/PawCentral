<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/postpet.css">
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
    <form id="postpetform" method="POST" action="<?=ROOT?>service/manage/edit/<?=htmlspecialchars($post->id)?>" onsubmit="validateForm(event)">
    <input type="text" name="tradeType" value="<?=htmlspecialchars($post->tradeType)?>" placeholder="ex:Rent">
<input type="text" name="petName" value="<?=htmlspecialchars($post->petName)?>" placeholder="Enter the pet's name:">
<input type="text" name="species" value="<?=htmlspecialchars($post->species)?>" placeholder="ex:German Shepherd">
<input type="text" name="breed" value="<?=htmlspecialchars($post->breed)?>" placeholder="Enter age:">
<input type="text" name="genderNeeds" value="<?=htmlspecialchars($post->genderNeeds)?>" placeholder="ex:Male/Female">
<input type="text" name="contactName" value="<?=htmlspecialchars($post->contactName)?>" placeholder="Enter your name:">
<input type="text" name="contactNumber" value="<?=htmlspecialchars($post->contactNumber)?>" placeholder="ex:-077 34 353">
<input type="email" name="email" value="<?=htmlspecialchars($post->email)?>" placeholder="Enter the E-mail:">
</form>
    </div>
    

    
</body>
</html>