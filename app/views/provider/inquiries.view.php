<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Inquiries</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/notification.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .date-time {
    position: absolute;bottom: 0 !important; right: 0 !important; margin: 10px;
}
    </style>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
    <div>
            <?php include("../app/views/components/provider/sidebar.php"); ?>
        </div>
        <div class="content">
            <h2>Inquiries</h2>
            <div class="notifications-section">

                <?php if (!empty($inquiries)) : ?>
                    <?php foreach ($inquiries as $inquiry) : ?>
                        <?php if($inquiry->reply!=1): ?>
                        <div class="notification-card" style=" position: relative; ">
                        <p class="date-times" style="position: absolute;bottom: 0 !important; right: 0 !important; margin: 10px;">
                                Date: <?= date('Y/m/d', strtotime($inquiry->created_at)) ?>
                                Time: <?= date('h:i A', strtotime($inquiry->created_at)) ?>
                            </p>
                            <h3><?= htmlspecialchars($inquiry->inquiry) ?></h3>
                            
                           
                            <div style="margin-top: 10px;">
                                
                            <button type="button" class="btn-reply" onclick="toggleReplyForm(<?= $inquiry->inquire_id ?>)"
    style="background-color: #4CAF50; color: white; border: none; padding: 8px 16px; margin-right: 10px; border-radius: 5px; cursor: pointer;">
    <i class="fas fa-reply"></i> Reply
</button>
<form method="GET" action="<?= ROOT ?>/provider/ignore" style="display:inline;">
    <input type="hidden" name="inquire_id" value="<?= $inquiry->inquire_id ?>">
    <button type="submit" class="btn-ignore"
        style="background-color:rgb(228, 39, 39); color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
        <i class="fas fa-times-circle"></i> Ignore
    </button>
</form>
                           
                            </div>
                                            <!-- Hidden reply form -->
                                            <form class="reply-form" id="reply-form-<?= $inquiry->inquire_id ?>"
    action="<?= ROOT ?>/provider/send_reply?id=<?= $inquiry->inquirer_id ?>&title=<?= $inquiry->inquiry ?>&inquire_id=<?= $inquiry->inquire_id ?>"
    method="POST"
    style="display: none; margin-top: 10px;">
    
    <textarea name="reply" rows="3" placeholder="Write your reply..." required
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea>
    <br>
    <button type="submit" class="btn-send"
        style="background-color: #2196F3; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; margin-top: 5px;">
        Send
    </button>
</form>
                        </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                    
                <?php else : ?>
                    <p>No inquiries found.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>

   
    <script>
    function toggleReplyForm(id) {
        const form = document.getElementById(`reply-form-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
<?php include("../app/views/components/footer.php"); ?>
</body>
</html>
