<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/manage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>
    <div class="managepost">Manage Post
        <div class="managepost-title">Review,edit or delete your active<br>posts here.</div>
    </div>
    <div class="post-container">
    <?php if(!empty($posts)): ?>
        <?php foreach($posts as $post): ?>
            <a href="<?=ROOT?>/manage/details?id=<?=htmlspecialchars($post->id)?>" class="card-link">
                <div class="card-container">
                    <div class="card">
                        <img src="<?=$post->image_path[0]?>" alt="<?=$post->image_path[0]?>">
                        <?=$post->image_path[0]?>
                        <div class="card-content">
                            <strong>Location:</strong> <?=htmlspecialchars($post->city)?><br>
                            <strong>Posted On:</strong> <?=htmlspecialchars($post->created_at)?><br>
                            <strong>Price:</strong> <?=htmlspecialchars($post->price)?><br>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?=ROOT?>/service/manage/edit?id=<?=htmlspecialchars($post->id)?>" class="btn">Edit<?=htmlspecialchars($post->id)?></a>
            <a href="<?=ROOT?>/service/manage/delete?id=<?=htmlspecialchars($post->id)?>" 
               class="btn" 
               onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No posts Available</p>
    <?php endif; ?>
</div>

</body>
</html>