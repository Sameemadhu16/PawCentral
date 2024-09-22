<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/assets/css/service.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../PawCentral/app/views/components/header.php' ?>
    <div class="welcomeMessage">
        <h1>WELCOME BACK,NAME</h1>
        <hr/>
    </div>
    <div class="createAndManageBox">
        <div class="createPost">
            <h3>Post Pet</h3>
            <ul>
                <li>Easily list your pets for <br/>sale ,rent,or import.</li>
                <li>Provide pet details and <br/>characteristics.</li>
                <li>Upload photos and videos.</li>
                <li>Manage international pet <br/>imports.</li>
                <li>Offering pets for <br/>temporary stays.</li>
            </ul>
            <button>Create Post</button>
        </div>
        <div class="managePost">
            <h3>Manage Post</h3>
            <ul>
                <li>Edit existing adoption <br/>listings</li>
                <li>Renew or deactivate posts </li>
                <li>Track engagement and <br/>performance</li>
                <li>Ensure your pets find the <br/>right homes</li>
            </ul>
            <button>View Post</button>
        </div>
    </div>
    
</body>
</html>