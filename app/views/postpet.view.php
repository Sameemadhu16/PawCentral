<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/assets/css/postpet.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../PawCentral/app/views/components/header.php' ?>
    <div class="title">
        <h2>Post Pet </h2>
        <hr/>
    </div>
   
    <div class="form">
        <form>
            <h3>Trade Type</h3>
            <input type="text" placeholder="ex:Rent">
            <h3>Pet's Name</h3>
            <input type="text" placeholder="Enter the pet's name:">
            <h3>Species</h3>
            <input type="text" placeholder="ex:Germen shepard">
            <h3>Breed</h3>
            <input type="text" placeholder="Enter age:">
            <h3>Gender/Special Needs</h3>
            <input  type="text" placeholder="ex:Rent" class="box">
            <h3>Contact Name:</h3>
            <input type="text" placeholder="Enter your name:">
            <h3>Contact Number</h3>
            <input type="text" placeholder="ex:-077 34 353">
            <h3>E-mail</h3>
            <input type="email" placeholder="Enter the E-mail:">
            
        </form>
    </div>
    <button class="button">NEXT</button>
    <button class="arrow-button"><img src=""></button>
</body>
</html>