<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/postpet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>
    <div class="title">
        <h2>Post Pet </h2>
        <hr/>
    </div>
   
    <div class="form">
        <form id="postpetform" method="POST" action="<?=ROOT?>/service/postpet/postpetnext">
            <h3>Trade Type</h3>
            <input type="text" name="tradeType" placeholder="ex:Rent">
            <h3>Pet's Name</h3>
            <input type="text" name="petName" placeholder="Enter the pet's name:">
            <h3>Species</h3>
            <input type="text" name="species" placeholder="ex:Germen shepard">
            <h3>Breed</h3>
            <input type="text" name="breed" placeholder="Enter age:">
            <h3>Gender/Special Needs</h3>
            <input  type="text" name="genderNeeds" placeholder="ex:Rent" class="box">
            <h3>Contact Name:</h3>
            <input type="text" name="contactName" placeholder="Enter your name:">
            <h3>Contact Number</h3>
            <input type="text" name="contactNumber" placeholder="ex:-077 34 353">
            <h3>E-mail</h3>
            <input type="email" name="email" placeholder="Enter the E-mail:">
            <button type="submit" class="button">NEXT</button>
        </form>
    </div>
    
    <button class="arrow-button"><img src=""></button>
</body>
</html>