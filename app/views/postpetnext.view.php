<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/postpetnext.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'?>
    <div class="container">
    <div class="title">
        <h2>Post Pet </h2>
        <hr/>
    </div>
    <div class="div1and2">
        <div class="list">
            <ul>
                <li><h4>Accepepted Formats:</h4><p>JPG,PNG,MP4</p></li>
                <li><h4>File size Limit:</h4><p>10MB per Image,50MB per video</p></li>
                <li><h4>Upload upto 5 photos and 1 video</h4></li>
                <li><h4>Ensure your video are lit and focused</h4></li>
                <li><h4>Reccomended Resolution:</h4><p>1080px x 1080px or higher for best resutls</p></li>
            </ul>
        </div>
        <div class="drag-box">
            <div class="content">
                <h1>DRAG HERE</h1>
                <button class="browse">Browse</button>
            </div>
           
        </div>
       
    </div>
    <div class="upload-div">
        <button class="upload">Upload</button>
    </div>
    
    <div class="summary">
        <ul>
            <li><h4>High quality pictures and videos greatly increases your pet's chances of finding the perfect home.Take a moment review your upload before submitting.</h4></li>
            
        </ul>
    </div>
    <div class="next">
        <button>NEXT</button>
    </div>
    </div>
    
</body>
</html>