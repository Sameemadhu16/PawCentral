<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Pet</title>
    <link rel="stylesheet" href="../../assets/css/postpetnext.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'; ?>
    
    <div class="container">
        <div class="title">
            <h2>Post Pet</h2>
            <hr />
        </div>

        <div class="content">
            <!-- Left Column: Image Upload Guidelines -->
            <div class="guidelines">
                <h3>Image Upload Guidelines</h3>
                <ul>
                    <li><strong>Accepted Formats:</strong> JPG, PNG</li>
                    <li><strong>File Size Limit:</strong> 10MB per Image</li>
                    <li><strong>Upload at least 1 photo</strong></li>
                    <li><strong>Ensure well-lit and focused images</strong></li>
                    <li><strong>Recommended Resolution:</strong> 1080px x 1080px or higher</li>
                </ul>
            </div>

            <!-- Right Column: Image Upload Form -->
            <div class="upload-section">
                <h3>Upload Pet Images</h3>
                <form action="<?=ROOT?>/service/postpet/postpetnext/submit" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="images">Select Images to Upload:</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/jpeg, image/png" required>
                    </div>
                    <button type="submit" class="upload-btn">Upload</button>
                </form>
            </div>
        </div>

        <!-- Summary Section -->
        <div class="summary">
            <p><strong>High-quality pictures</strong> increase your pet's chances of finding the perfect home. Take a moment to review your upload before submitting.</p>
        </div>
    </div>
</body>
</html>
