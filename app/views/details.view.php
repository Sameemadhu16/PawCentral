<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="../assets/css/details.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'; ?>
    <div class="details-container">
        <div class="image">
            <img src="<?=htmlspecialchars($post->image_path)?>" alt="Post Image">
        </div>
        <div class="content">
            <h2>Post Details</h2>
            <p><strong>Location:</strong> <?=htmlspecialchars($post->city)?></p>
            <p><strong>Posted On:</strong> <?=htmlspecialchars($post->created_at)?></p>
            <p><strong>Price:</strong> <?=htmlspecialchars($post->price)?></p>
            <p><strong>Description:</strong> <?=htmlspecialchars($post->description)?></p>
        </div>
    </div>
</body>
</html>