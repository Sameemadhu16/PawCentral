
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Pet</title>
    <link rel="stylesheet" href="../../assets/css/postpetnext.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'; ?>
    <div class="container">
        <div class="title">
            <h2>Post Pet</h2>
            <hr />
        </div>
        <div class="div1and2">
            <div class="list">
                <ul>
                    <li><h4>Accepted Formats:</h4><p>JPG, PNG</p></li>
                    <li><h4>File Size Limit:</h4><p>10MB per Image</p></li>
                    <li><h4>Upload a 1 photo</h4></li>
                    <li><h4>Ensure your images are well-lit and focused</h4></li>
                    <li><h4>Recommended Resolution:</h4><p>1080px x 1080px or higher for best results</p></li>
                </ul>
            </div>

            <!-- Image Upload Form -->
            <form action="<?=ROOT?>/service/postpet/postpetnext/submit" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="images"><h4>Select Images to Upload:</h4></label>
                    <input type="file" name="images[]" id="images" multiple accept="image/jpeg, image/png" required>
                    
                </div>
                <div class="upload-div">
                    <button type="submit" class="upload">Upload</button>
                </div>
            </form>
        </div>
        
        <div class="summary">
            <ul>
                <li><h4>High-quality pictures greatly increase your pet's chances of finding the perfect home. Take a moment to review your upload before submitting.</h4></li>
            </ul>
        </div>
        
    </div>
</body>
</html>
